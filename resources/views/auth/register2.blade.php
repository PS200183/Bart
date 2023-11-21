<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url("https://rsms.me/inter/inter.css");

        :root {
            --color-gray: #737888;
            --color-lighter-gray: #e3e5ed;
            --color-light-gray: #f7f7fa;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        html {
            font-family: "Inter", sans-serif;
            font-size: 14px;
            box-sizing: border-box;
        }

        @supports (font-variation-settings: normal) {
            html {
                font-family: "Inter var", sans-serif;
            }
        }

        body {
            margin: 0;
        }

        h1 {
            margin-bottom: 1rem;
        }

        p {
            color: var(--color-gray);
        }

        hr {
            height: 1px;
            width: 100%;
            background-color: var(--color-light-gray);
            border: 0;
            margin: 2rem 0;
        }

        .form-container {
            max-width: 40rem;
            padding: 24px 2rem 0;
            margin: 0 auto;
            height: 100vh;
        }

        .image-container {
            display: flex;
            align-items: center;

        }

        .image-container {
            width: 100%;

        }

        .image-container img {
            width: 100%;
            height: 100%;
        }

        .form {
            display: grid;
            grid-gap: 1rem;
        }

        .field {
            width: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--color-lighter-gray);
            padding: .5rem;
            border-radius: .25rem;
        }

        .field__label {
            color: var(--color-gray);
            font-size: 0.6rem;
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 0.25rem
        }

        .field__input {
            padding: 0;
            margin: 0;
            border: 0;
            outline: 0;
            font-weight: bold;
            font-size: 1rem;
            width: 100%;
            -webkit-appearance: none;
            appearance: none;
            background-color: transparent;
        }

        .field:focus-within {
            border-color: #000;
        }

        .fields {
            display: grid;
            grid-gap: 1rem;
        }

        .fields--2 {
            grid-template-columns: 1fr 1fr;
        }

        .fields--3 {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .button {
            background-color: #000;
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 600;
            display: block;
            color: #fff;
            width: 100%;
            padding: 1rem;
            border-radius: 0.25rem;
            border: 0;
            cursor: pointer;
            outline: 0;
        }

        .button:focus-visible {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <div class="form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="fields fields--2">
                                <label class="field">
                                    <span class="field__label" for="firstname">First name</span>
                                    <input class="field__input" type="text"  name="firstname" value="John" />
                                </label>
                                <label class="field">
                                    <span class="field__label" for="lastname">Last name</span>
                                    <input class="field__input" type="text" name="lastname" value="Doe" />
                                </label>
                            </div>
                            <label class="field">
                                <span class="field__label" for="email">Email</span>
                                <input class="field__input" type="text" name="email" />
                            </label>
                            <label class="field">
                                <span class="field__label" for="address">Address</span>
                                <input class="field__input" type="text" name="address" />
                            </label>
                            <label class="field">
                                <span class="field__label" for="country">Country</span>
                                <select class="field__input" name="country">
                                    <option value=""></option>
                                    <option value="unitedstates">United States</option>
                                </select>
                            </label>
                            <div class="fields fields--3">
                                <label class="field">
                                    <span class="field__label" for="zipcode">Zip code</span>
                                    <input class="field__input" type="text" name="zipcode" />
                                </label>
                                <label class="field">
                                    <span class="field__label" for="city">City</span>
                                    <input class="field__input" type="text" name="city" />
                                </label>
                                <label class="field">
                                    <span class="field__label" for="state">State</span>
                                    <select class="field__input" name="state">
                                        <option value=""></option>
                                    </select>
                                </label>
                            </div>

                            <!-- Additional Billing Information Fields -->
                            <label class="field">
                                <span class="field__label" for="billingaddress">Billing Address</span>
                                <input class="field__input" type="text" name="billingaddress" />
                            </label>
                            <label class="field">
                                <span class="field__label" for="billingzipcode">Billing Zip code</span>
                                <input class="field__input" type="text" name="billingzipcode" />
                            </label>
                            <label class="field">
                                <span class="field__label" for="billingcity">Billing City</span>
                                <input class="field__input" type="text" name="billingcity" />
                            </label>

                            <!-- Shipping Address -->
                            <label class="field">
                                <span class="field__label" for="shippingaddress">Shipping Address</span>
                                <input class="field__input" type="text" name="shippingaddress" />
                            </label>
                            <label class="field">
                                <span class="field__label" for="shippingzipcode">Shipping Zip code</span>
                                <input class="field__input" type="text" name="shippingzipcode" />
                            </label>
                            <label class="field">
                                <span class="field__label" for="shippingcity">Shipping City</span>
                                <input class="field__input" type="text" name="shippingcity" />
                            </label>

                            <!-- Phone Number -->
                            <label class="field">
                                <span class="field__label" for="phone">Phone Number</span>
                                <input class="field__input" type="text" name="phone" />
                            </label>
                            <hr>
                            <button class="button" type="submit">Register</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>
