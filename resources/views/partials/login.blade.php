<form  action="{{ route('login') }}" method="post">
    @csrf
    <div>
        <div class="customer-login text-left">
            <h4 class="title-1 title-border text-uppercase mb-30">Registered customers</h4>
            <p class="text-gray">If you have an account with us, Please login!</p>
            <input type="email" placeholder="Email here..." name="email">
            <input type="password" placeholder="Password" name="password">
            <p><a href="#" class="text-gray">Forget your password?</a></p>
            <button type="submit" data-text="login" class="button-one submit-button mt-15">login</button>
        </div>					
    </div>
</form>