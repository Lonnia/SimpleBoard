<?
$servername = "localhost";
$username = "/*your database username*/";
$password = "/*your database password*/";

// Create connection
$conn = mysql_connect($servername, $username, $password);
mysql_select_db('/*your database name*/', $conn);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error() );
} 


if($_POST['uploader'] && $_POST['contents']){
    $uploader = $_POST['uploader'];
    $contents = $_POST['contents'];
    $uptime = date('Y-m-d H:i:s');


    $sql = "insert into board (uploader, contents, uptime) values (\"$uploader\", \"$contents\", \"$uptime\" )";
    
    // 쿼리문 작성/적용
    mysql_query($sql, $conn);
    // 디비 닫기
    mysql_close($conn);
}
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
    $sql = mysql_query("SELECT * FROM board", $conn);
    //fetch tha data from the database
    while ($result = mysql_fetch_array($sql)) {
        if ($result=='') { ?>
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
        <?}
    }?>
</table>
