<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="sub-address">
    <?
        if ($address == "main-address2") {
            $result = "<select>
            <option value='subAddress1'>서초구</option>
            <option value='subAddress2'>동작구</option>
            <option value='subAddress3'>성동구</option>
            </select>";

        } elseif ($address == "main-address3") {
            $result = "<select>
            <option value='subAddress4'>용인시</option>
            <option value='subAddress5'>화성시</option>
            <option value='subAddress6'>동두천시</option>
            </select>";

        } elseif ($address == "main-address4") {
            $result = "<select>
            <option value='subAddress7'>송도</option>
            </select>";

        } elseif ($address == "main-address5") {
            $result = "<select>
            <option value='subAddress8'>서귀포시</option>
            <option value='subAddress9'>제주시</option>
            </select>";
        }
        
        // echo rawurlencode(iconv("CP949", "UTF-8", $result)); // ajax 통신은 UTF-8 이 기본이므로 인코딩 후 rawurlencode 해줌
        ?>
    </div>
    </body>
</html>