<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Empleados
$route['agregarEmpleado'] = 'EmpleadosController/insert';
$route['cargarEmpleados'] = 'EmpleadosController/fetch';
$route['editarEmpleado'] = 'EmpleadosController/edit';
$route['actualizarEmpleado'] = 'EmpleadosController/update';
$route['eliminarEmpleado'] = 'EmpleadosController/delete';
// Materias
$route['agregarMateria'] = 'MateriasController/insert';
$route['cargarMaterias'] = 'MateriasController/fetch';
$route['editarMateria'] = 'MateriasController/edit';
$route['actualizarMateria'] = 'MateriasController/update';
$route['eliminarMateria'] = 'MateriasController/delete';
//Grados
$route['agregarGrado'] = 'GradosController/insert';
$route['cargarGrados'] = 'GradosController/fetch';
$route['editarGrado'] = 'GradosController/edit';
$route['actualizarGrado'] = 'GradosController/update';
$route['eliminarGrado'] = 'GradosController/delete';
//Secciones
$route['agregarSeccion'] = 'SeccionesController/insert';
$route['cargarSecciones'] = 'SeccionesController/fetch';
$route['editarSeccion'] = 'SeccionesController/edit';
$route['actualizarSeccion'] = 'SeccionesController/update';
$route['eliminarSeccion'] = 'SeccionesController/delete';
//Periodos
$route['agregarPeriodo'] = 'PeriodosController/insert';
$route['cargarPeriodos'] = 'PeriodosController/fetch';
$route['editarPeriodo'] = 'PeriodosController/edit';
$route['actualizarPeriodo'] = 'PeriodosController/update';
$route['eliminarPeriodo'] = 'PeriodosController/delete';

//Usuarios -C
$route['agregarUsuario'] = 'UsuariosController/insert';
$route['cargarUsuarios'] = 'UsuariosController/fetch';
$route['cargarUsuario'] = 'UsuariosController/fetchbyId';
$route['editarUsuario'] = 'UsuariossController/edit';
$route['actualizarUsuario'] = 'UsuariosController/update';
$route['eliminarUsuario'] = 'UsuariosController/delete';

//EmpleadoporId
$route['cargarEmpleado'] = 'EmpleadosController/fetchbyId';