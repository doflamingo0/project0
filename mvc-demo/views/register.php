<?php 
use app\core\form\Form;
require_once "./../core/form/Form.php";
?>

<h1>Create an account</h1>
<?php $form = Form::begin('', "post") ?>
	<div class="row">
		<div class="col">
			<?php echo $form->field($model, 'fname')  ?>
		</div>
		<div class="col">
			<?php echo $form->field($model, 'lname')  ?>
		</div>
	</div>
	<?php echo $form->field($model, 'email')  ?>
	<?php echo $form->field($model, 'password')->passwordField()   ?>
	<?php echo $form->field($model, 'confirmPassword')->passwordField()  ?>
	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end() ?>

<!-- <form action="" method='post'>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>First name</label>
				<input type="text" name="fname" value="<?php echo $model->fname; ?>" 
				class="form-control<?php echo $model->hasError('fname')?' is-invalid':'' ?>">
			
			<div class="invalid-feedback">
				<?php echo $model->getFirstError('fname')?>
			</div>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Last name</label>
				<input type="text" name="lname" class="form-control">
			</div>
		</div>
	</div>
	
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="confirmPassword" class="form-control">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->