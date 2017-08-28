<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <h1><?php  echo Html::encode('test') ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo  Html::a('Create Room', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>   
		<div class="row"> 
			<div class="col-md-4">
					<h1>test1</h1>
				<?php $count=0;?>
					<?php foreach ($dataProvider->models as $d) : ?>
					
						<table class="table table-striped">
								<tr>
									<td><?=$count+=1?></td>
									<td><?= $d->descriptoin?></td>
								</tr>
						</table>
						
								
					<?php endforeach;?>
					
			
			</div>
			<div class=""col-md-8">
					<h2>test</h2>
			
			</div>
		</div>
<?php Pjax::end(); ?></div>
