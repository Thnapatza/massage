<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'การจัดอันดับ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-raking">
<style>
.center {
    text-align: center;

}
</style>
    <div class="container" >
    <center>	<h1><?= Html::encode($this->title) ?></h1>
    		
    	 <table class="table table-bordered" style="background-color: rgba(192,192,192,0.3); width:50%; ">
    	  <thead class="thead-dark">
          <tr class="w3-light-grey">
            <th>ชื่อ</th>
            <th>คะแนน</th>
          </tr>
        </thead>
<?php $ar;
$i=0;
$j=0;
foreach ($user as $users) { 
    $ar[$i] =  $users["point"];

    $i++; }
		
		?>  
	
    	<?php foreach ($username as $usernames) :?>
    	<tr>
			<td><?= $usernames->fname;?></td>
			<?php if($j < count($ar)){    ?>
			<td><?php echo $ar[$j];?></td>
 <?php }else echo '<td>0</td>'?>
		</tr>
		<?php $j++; endforeach;?>  	
		
		  </table>
 	</center>
 	</div>

</div>

<?php function exo($string){
    $rt = explode(" ",$string);
}?>


