let express = require('express');
let app = express();
let bodyParser = require('body-parser');
let mysql = require('mysql');



app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// homepage route
app.get('/', (req, res) => {
    return res.send({ 
        error: false, 
        name: 'Chanon Leenainam',
        major: 'Computer Engineering'
    })
})

// connection to mysql database
let dbCon = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'nodejs-carrent'
})
dbCon.connect();

// retrieve all car 
app.get('/car', (req, res) => {


    dbCon.query('SELECT * FROM car', (error, results, fields) => {
        if (error) throw error;

        let message = ""
        if (results === undefined || results.length == 0) {
            message = "car table is empty";
        } else {
            message = "Successfully retrieved all car";
        }
        return res.send({ error: false, data: results, message: message});
    })
})

// add a new car
app.post('/insert', (req, res) => {
  
    let name = req.body.name;
    let license = req.body.license;
    let brand = req.body.brand;
    let color = req.body.color;
    let price = req.body.price;
    let status = req.body.status;
    let year = req.body.year;
    let detail = req.body.detail;

    // validation
    if (!name || !license || !brand || !color || !price || !status  || !year || !detail ) {
        return res.status(400).send({ error: true, message: "Please provide car license color status brand price year and detail."});
    } else {
        dbCon.query('INSERT INTO car ( name, license, brand ,color ,price, status, year, detail ) VALUES(?, ?, ?, ?, ?, ?, ?, ?)', [name, license, brand, color, price, status, year, detail], (error, results, fields) => {
            if (error) throw error;
            return res.send({ error: false, data: results, message: "car successfully added"})
        })
    }
});

// retrieve car by id 
app.get('/car/:id', (req, res) => {

    let id = req.params.id;
    
    if (!id) {
        return res.status(400).send({ error: true, message: "Please provide car id"});
    } else {
        dbCon.query("SELECT * FROM car WHERE id = ?", id, (error, results, fields) => {
            if (error) throw error;

            let message = "";
            if (results === undefined || results.length == 0) {
                message = "car not found";
            } else {
                message = "Successfully retrieved car data";
            }

            return res.send({ error: false, data: results[0], message: message })
        })
    }
})

// update car with id  


//error อยู่
app.put('/update', (req, res) => {

    let id = req.body.id;
    let name = req.body.name;
    let license = req.body.license;
    let brand = req.body.brand;
    let color = req.body.color;
    let price = req.body.price;
    let status = req.body.status;
    let year = req.body.year;
    let detail = req.body.detail;
    

    // validation
    if (!name || !license || !brand || !color || !price || !status  || !year || !detail ) {
        return res.status(400).send({ error: true, message: "Please provide car license color status brand price year and detail."});
    } else {
        dbCon.query('UPDATE car SET name = ?, license = ?, brand = ?, color = ?, price = ?, status = ?, year = ?, detail = ?  WHERE id = ?', 
        [name ,license ,brand ,color ,price ,status ,year  ,detail , id], (error, results, fields) => {
            if (error) throw error;

            let message = "";
            if (results.changedRows === 0) {
                message = "car not found or data are same";
            } else {
                message = "car successfully updated";
            }

            return res.send({ error: false, data: results, message: message })
        })
    }
})


// delete car by id
app.delete('/del', (req, res) => {
    let id = req.body.id;

    if (!id) {
        return res.status(400).send({ error: true, message: "Please provide car id"});
    } else {
        dbCon.query('DELETE FROM car WHERE id = ?', [id], (error, results, fields) => {
            if (error) throw error;

            let message = "";
            if (results.affectedRows === 0) {
                message = "car not found";
            } else {
                message = "car successfully deleted";
            }

            return res.send({ error: false, data: results, message: message })
        })
    }
})

app.listen(3000, () => {
    console.log('Node App is running on port 3000');
})

module.exports = app;
