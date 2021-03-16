<p class="form-row form-row-wide">
    <label for="reg_password2">{{  __('Password Repeat', 'woocommerce') }}<span class="required">*</span></label>
    <input type="password"
           class="input-text"
           name="password2"
           id="reg_password2"
           value="{!! !empty($_POST['password2']) ? esc_attr($_POST['password2']) : '' !!}"/>
</p>