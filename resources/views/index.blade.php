<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>
    <meta property="og:image" content=""/>
    <meta property="og:description" content="">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/png" href="">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body style="">
<div id="app" v-cloak>
    <layout></layout>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
