<?

$servername = "localhost";
$username = "/*your databse id*/";
$password = "/*your databse password*/";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


if($_POST['uploader']!='' && $_POST['contents']!=''){
     // 쿼리문 작성
    $query = "insert into board (uploader, contents, uptime) values ('$uploader', '$contents', 'date('Y-m-d H:i:s')')";
    // 쿼리문 적용
    mysql_query($query, $connect);
    // 디비 닫기
    mysql_close($connect);
}

$sql = "SELECT * FROM board";
$result = $conn->query($sql);

?>
<form name="iForm" method="post">
    <table style="width:700px;height:50px;border:5px #CCCCCC solid;">
        <tr>
            <td align="center" valign="middle" style="font-size:30px;font-weight:bold;">Board</td>
        </tr>
    </table>
    <table style="width:700px;height:50px;border:0px;">
        <tr>
        <td align="center" valign="middle" style="width:100px;height:50px;">
            <input type="text" id="uploader" name="uploader" style="width:300px;" placeHolder="Uploader">
        </td> 
        <td align="center" valign="middle" style="width:100px;height:50px;">
            <input type="text" id="contents" name="contents" style="width:300px;" placeHolder="Contents">
        </td>
        <td align="center" valign="middle" style="width:50px;height:50px;">
            <input type="submit" value="저장">
        </td>
    </tr>
</table>
</form>


<!-- 방명록 내용 -->
<table style="width:700px;border:1px #CCCCCC solid;">
    <tr align="center" valign="middle" style="font-size:20px;font-weight:bold;">
        <td style="padding:5px 5px 5px 5px;">Uploader</td>
        <td style="padding:5px 5px 5px 5px;">Contents</td>
        <td style="padding:5px 5px 5px 5px;">Uploaded Time</td>
    </tr>
    <?
    if ($result->num_rows < 0) {

        ?>
        <tr align="center" valign="middle" style="height:1px;background-color:#CCCCCC;">
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr align="center" valign="middle" style="height:1px;">
            <td>NULL</td>
            <td>NULL</td>
            <td>NULL</td>
        </tr>
        <?}else{?>
        <tr align="center" valign="middle" style="height:1px;background-color:#CCCCCC;">
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr align="center" valign="middle" style="font-size:15px;">
            <td style="padding:5px 5px 5px 5px;"><?=$result['uploader']?></td>
            <td style="padding:5px 5px 5px 5px;"><?=$result['contents']?></td>
            <td style="padding:5px 5px 5px 5px;"><?=$result['uptime']?></td>
        </tr>
        <?}?>
    </table>
