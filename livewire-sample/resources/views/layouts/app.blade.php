<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>タイトル</title>
@livewireStyles

<style>
input, textarea, button {
 border: 1px solid gray;
 padding: 4px !important;
}
input[type=submit], input[type=button] {
  padding: 4px !important;
}
td {
  border:1px solid gray; padding:3px;
}
h1 {
  font-size: 40px !important;
}
.status {
  font-size: 18px;
  font-weight: bold;
  color: blue;
}
/* Pagination 用 */
span[aria-current=page] > span {
  color: white;
  background-color: green !important;
}
</style>
</head>
<body>

{{ $slot }}

@livewireScripts

@stack('js')

</body>
</html>
