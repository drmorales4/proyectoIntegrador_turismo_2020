/*const mysql = require('mysql')

const conection = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: '',
	database: 'observatorio'
})

conection.connect((err) =>{
	if(err) throw err
		console.log('La conexion funciona')
})

conection.query('Select * from user', (err, rows) =>{
	if(err) throw err
		
	console.log('Los datos de la tabla son estos:')
	console.log(rows)
	console.log('La cantida de resultados es:')
	console.log(rows.length)
	console.log(rows[0])
	const usuarioUno = rows[0]
	console.log('El usuario se llama ' + usuarioUno.nombres + ' y tiene el id ' + usuarioUno.idUser)
})



conection.query('SELECT DISTINCT(YEAR(fecha)) AS anios FROM registros', (err, rows) =>{
	if(err) throw err
		consolte.log("nice")

})
conection.end()
*/
modulo.exports ={
	database: {
		host: 'localhost',
		user: 'root',
		password: '',
		database: 'observatorio'
	}
}
var nombre = "ricardo";
var apellido = "freire";
var concatenacion = "hola xd "
var anio = document.getElementById("anio");
anio.innerHTML = '<option>'+nombre+ '</option><option>'+apellido+'</option>';

