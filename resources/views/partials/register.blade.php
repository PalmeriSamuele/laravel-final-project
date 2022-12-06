<form action="{{ route('register') }}" method="post">
    @csrf

        <div class="customer-login text-left">
            <h4 class="title-1 title-border text-uppercase mb-30">new customers</h4>
            <p class="text-gray">If you have an account with us, Please login!</p>
            <input type="text" placeholder="Your name here..." name="name">
            <input type="text" placeholder="Email address here..." name="email">
            <input type="password" placeholder="password" name="password">
            <input type="password" placeholder="Confirm password" name="password_confirmation">
            <p class="mb-0">
                <input type="checkbox" id="newsletter" name="newsletter" checked>
                <label for="newsletter"><span>Sign up for our newsletter!</span></label>
            </p>
            <button type="submit" data-text="regiter" class="button-one submit-button mt-15">register</button>
        </div>					

</form>