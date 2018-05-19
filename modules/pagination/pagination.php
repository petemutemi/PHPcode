<?php
    //Require Utility Class
    require_once ("bin/utility.php");  
?>
<div class="container">
    <div class="row">
        <table style="width: 100%; border-top: 3px double #333">
            <tr style="">
                <th>No.</th>
                <th style="text-align: left">FULL NAME</th>
                <th>PHONE NUMBER</th>
            </tr>
            <?php 
                //Pagination Variables
                $perpage = 5;
                if(isset($_GET["page"])){
                    $curpage = $_GET["page"];
                }else{
                    $curpage = 1;
                }
                $start = ($curpage * $perpage) - $perpage;
                $totalres = 0;
                //Query DB For Results
                $stmtA = $conn->prepare("SELECT * FROM contacts");
                $stmtA->execute();
                foreach($stmtA->fetchAll() as $k=>$rowA){$totalres++;}
                $stmt = $conn->prepare("SELECT * FROM contacts LIMIT $start,$perpage");
                $stmt->execute();
                //Records Style & Count Variables
                $count = 1;
                $tr_light = "style='background: #f5f5f5;'";
                $tr_dark = "style='background: #dedede;'";
                //Display Records
                foreach($stmt->fetchAll() as $k=>$row){
                    $no = $count * $curpage;
                    if($count%2 == 0){$stl = $tr_light;}
                    else{ $stl = $tr_dark;}
                    echo ' 
                        <tr '.$stl.'>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["name"].'</td>
                            <td class="td_right">'.$row["phone"].'</td>
                        </tr>
                    ';
                    $count++;
                }
                $endpage = ceil($totalres/$perpage);
                $startpage = 1;
                if($curpage < $endpage){
                    $nextpage = $curpage + 1;
                }else {
                    $nextpage = $endpage;
                }
                if($curpage >= 2){
                    $previouspage = $curpage - 1;
                }else{
                    $previouspage = 1;
                }
            ?>
        </table>
        <?php 
            //Display Pagination Buttons
            require_once ("paginationNav.php"); 
        ?>
    </div>
</div>