<!--
/**
 * Created by PhpStorm.
 * User: anwarsarmiento
 * Email: asarmiento@sistemasamigables.com
 * Date: 17/5/17
 * Time: 20:25
-->
@extends('layouts.system')

<div class="content">
    <div class="text-center row"><h2>Bienvenid@ : {{$profile->name}}</h2></div>
    <div class="text-center row"><img src="http://mipymes.hondurastartup.com/wp-content/uploads/2017/05/logotipo.png" width="350" height="150"></div>

    <div class="text-center row"><h3>Bienvenid@!! has sido registrado correctamente!.</h3></div>
    	<div class="text-center row"><h3>Tu numero de proyecto es : {{$profile->idproject}}</h3></div>
    	<div class="text-center row"><h4>Pronto estaremos comunicandonos contigo..</h4></div>


</div>