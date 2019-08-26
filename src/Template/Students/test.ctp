<form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
	<input class="form-control" type="text" id="fullname" name="fullname" placeholder="Required" data-parsley-required="true" />
	<input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" />
	<input class="form-control" type="url" id="website" name="website" data-parsley-type="url" placeholder="url" />
	<textarea class="form-control" id="message" name="message" rows="4" data-parsley-range="[20,200]" placeholder="Range from 20 - 200"></textarea>
	<input class="form-control" type="text" id="digits" name="digits" data-parsley-type="digits" placeholder="Digits" />
	<input class="form-control" type="text" id="number" name="number" data-parsley-type="number" placeholder="Number" />
	<input class="form-control" type="text" id="data-phone" data-parsley-type="number" placeholder="(XXX) XXXX XXX" />

	<input class="form-control" type="text" id="alphanum" name="alphanum"  data-type="alphanum" placeholder="Alphanumeric String."  data-parsley-required="true" />
	<input class="form-control" type="text" id="data-dateIso" placeholder="YYYY-MM-DD"  data-parsley-required="true" />


	<select class="form-control" id="select-required" name="selectBox" data-parsley-required="true">
		<option value="">Please choose</option>
		<option value="foo">Foo</option>
		<option value="bar">Bar</option>
	</select>


	<div class="radio">
		<label>
			<input type="radio" name="radiorequired" value="foo" id="radio-required" data-parsley-required="true" /> Radio Button 1
		</label>
	</div>
	<div class="radio">
		<label>
			<input type="radio" name="radiorequired" id="radio-required2" value="bar" /> Radio Button 2
		</label>
	</div>


	<div class="col-md-6 col-sm-6">
		<div class="checkbox"><label><input type="checkbox" id="mincheck" name="mincheck[]" data-parsley-mincheck="2" value="foo" required /> Checkbox 1</label></div>
		<div class="checkbox"><label><input type="checkbox" name="mincheck[]" value="bar" /> Checkbox 2</label></div>
		<div class="checkbox"><label><input type="checkbox" name="mincheck[]" value="baz" /> Checkbox 3</label></div>
	</div>


	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">Regular Expression :</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control parsley-validated" type="text" id="data-regexp" data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="hexa color code" data-required="true" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-danger">Validate</button>
		</div>
	</div>
</form>