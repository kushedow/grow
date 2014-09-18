<?php 

return array(

	'auth/<action:\w+>'=>'auth/<action>',
	'register'=>'auth/register',
	'turn/<id:\d+>'=>'auth/turn',

	// Группы и прогресс по треками по группам

	'groups'=>'groups/index',
	'groups/<code:\w+>'=>'groups/bycode',				
	'groups/<id:\d+>/progress/<trackid:\d+>'=>'tracks/progress',	

	"check/<code:\w+>"=>"groups/tracks",
	"check"=>"tasks/checkall",


	'course/<id:\d+>'=>'courses/byid',
	'course/<code:\w+>'=>'courses/bycode',
	'course/<id:\d+>/edit'=>'editor/edit_course',
	'course/<code:\w+>/algorithms'=>'algorithms/bycourse',	
	
	'track/<id:\d+>'=>'tracks/byid',
	'track/<code:\w+>'=>'tracks/bycode',
	'track/<id:\d+>/theory'=>'tracks/theory',
	'track/<id:\d+>/edit'=>'editor/edit_track',
				

	// Задания и решения

	'task/<id:\d+>'=>'tasks/byid',
	'task/<id:\d+>/restart'=>'tasks/restart',	
	'task/<id:\d+>/edit'=>'editor/edit_task',
	'task/<id:\d+>/remove'=>'tasks/remove',
	'task/<task:\d+>/<student:\d+>/set/<status:\w+>'=>'tasks/setstatus',

	'student<student:\d+>/task<task:\d+>'=>'tasks/someonestask',
	'student<id:\d+>'=>'students/profile',
	'student<id:\d+>/addpoint'=>'students/addpoint',	
	'students/create'=>'students/create',


	// Библиотека

	'docs'=>'docs/index',
	'docs/my'=>'docs/my',
	'docs/<doc:\d+>/add'=>'docs/add',


	'students'=>'students/index',

	// Достижения и портфолио

	//'achievments/<id:\d+>'=>'achievments/byid',

	//'<code:\w+>/portfolio'=>'portfolio/index',

	// Профили и портфолио

	'profile/<id:\d+>'=>'student/profile',

	// создание нового

	'new/track/<course:\d+>'=>'editor/create_track'	,
	'new/track'=>'editor/create_track',

	'new/task/<track:\d+>'=>'editor/create_task',
	'new/task'=>'editor/create_task',

	// песочницы

	'send'=>"sandbox/form",
	'sandbox'=>"sandbox/index",
	'sandbox/new'=>"sandbox/create",			
	'sandbox/<id:\d+>/edit'=>"sandbox/edit",
	'sandbox/<id:\d+>/preview'=>"sandbox/preview",	
	'sandbox/<id:\d+>/fork'=>"sandbox/fork",	

	// 

	'algorithms'=>'algorithms/index',			
	'algorithms/<id:\d+>'=>'algorithms/preview',
	'algorithms/new'=>'algorithms/create',				
	'algorithms/<id:\d+>/edit'=>'algorithms/edit',

	// 

	'videos'=>"videos/index",
	'video/<id:\d+>'=>"videos/byid",

	'videos/create'=>"editor/createvideo",
	'video/<id:\d+>/edit'=>"editor/editvideo",

	'faqs/create/<id:\d+>'=>"editor/createfaq",
	'faqs/<id:\d+>/edit'=>"editor/editfaq",


	'settings'=>"students/settings",

	'bugreport'=>"site/bugreport"


); ?>