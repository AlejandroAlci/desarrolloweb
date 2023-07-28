const express = require('express');
const app = express();
const http = require('http');
const moment = require('moment');
const server = http.Server(app);
const port = process.env.PORT || 3000;
const bodyParser = require('body-parser');
const { Client } = require('pg');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use(function (req, res, next) {
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
  res.setHeader('Access-Control-Allow-Credentials', true);
  next();
});


const client = new Client({
    user: 'postgres',
    host: '127.0.0.1',
    database: 'ciclismo',
    password: '123456789',
    port: '5432',
  }) ;
  module.exports = client




  app.get('/', function (req, res) {
    res.status(200).json({ mensaje: "API REST: EDISON LEONARDO SOLÓRZANO SOLÓRZANO" });
  });

app.get('/obtener_personas', (req, res)=>{
    client.query('Select * from rutas_ciclismo', (err, result)=>{
        if(!err){
            res.json(result.rows);
        }
    });
    client.end;
});

// obtener persona por cédula --> pasar parámetro usando postman o similar
app.post('/obtener_persona', function (req, res){
  const POSTOBTENER = req.body;
  client.query(`Select * from rutas_ciclismo where id = '${POSTOBTENER.id}'`, (err, result)=>{
    if(!err){
        res.json(result.rows);
    }
});
client.end;
});

app.post('/guardar_persona', function (req, res) {
 const POSTGUARDAR = req.body;
    let insertQ = `insert into rutas_ciclismo(id, nombre, distancia_km, dificultad) 
             values(${POSTGUARDAR.id}, '${POSTGUARDAR.nombre}', '${POSTGUARDAR.distancia_km}', '${POSTGUARDAR.dificultad}')`

    client.query(insertQ, (err, result) => {
        if (!err) {
            res.json('Datos insertados correctamente')
        } else { console.log(err.message) }
    })
    client.end;
});

app.post('/actualizar_persona', function (req, res) {
  const POSTACTUALIZAR = req.body;
  let actualiQ = `UPDATE rutas_ciclismo SET id = '${POSTACTUALIZAR.id}', nombre = '${POSTACTUALIZAR.nombre}', 
  distancia_km = '${POSTACTUALIZAR.distancia_km}', dificultad = '${POSTACTUALIZAR.dificultad}' where id = '${POSTACTUALIZAR.id}'`

  client.query(actualiQ, (err, result) => {
      if (!err) {
          res.json('Datos actualizados correctamente')
      } else { console.log(err.message) }
  })
  client.end;
});

app.post('/eliminar_persona', function (req, res) {
  const POSTELIMINAR = req.body;
  let eliminarQ = `DELETE FROM rutas_ciclismo WHERE id = '${POSTELIMINAR.id}'`

  client.query(eliminarQ, (err, result) => {
      if (!err) {
          res.json('Datos Eliminados Exitosamente')
      } else { console.log(err.message) }
  })
  client.end;
});



client.connect();

  server.listen(port, () => {
    console.log(`Servidor iniciado en el puerto: ${port}`),
    console.log(`Conexion establecida Exitosamente`);
  });
   