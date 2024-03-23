@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')

<div class="container">

    <div class="row mt-5">
        <div class="col-sm-8 mx-auto">

            <div class="card shadow">
                <div class="card-header">Obtain access token</div>
                
                <div class="card-body">
                <h4 id="access_token"></h4>
                    <button id="getAccessToken" class="btn btn-primary">Request Access Token</button>
                </div>
            </div>

            <div class="card mt-5 shadow">
                <div class="card-header">Register URLs</div>
                <div class="card-body">
                    <div id="response"></div>
                    <button id="registerURLS" class="btn btn-primary">Register URLs</button>
                </div>
            </div>

            <div class="card mt-5 shadow">
                <div class="card-header">Simulate Transaction</div>
                <div class="card-body">
                    <div id="c2b_response"></div>
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount">
                        </div>
                        <div class="form-group mb-5">
                            <label for="account">Account</label>
                            <input type="text" name="account" class="form-control" id="account">
                        </div>
                        <button id="simulate" class="btn btn-primary">Simulate Payment</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>



<script>

            document.getElementById('getAccessToken').addEventListener('click', (event) => {
            event.preventDefault()
            axios.post('/get-token', {})
            .then((response) => {
                console.log(response.data);
                document.getElementById('access_token').innerHTML = response.data
            })
            .catch((error) => {
                console.log(error);
            })
        });


            document.getElementById('registerURLS').addEventListener('click', (event) => {
            event.preventDefault()

            axios.post('register-urls', {})
            .then((response) => {
                if(response.data.ResponseDescription){
                    document.getElementById('response').innerHTML = response.data.ResponseDescription
                } else {
                    document.getElementById('response').innerHTML = response.data.errorMessage
                }
                console.log(response.data);
            })
            .catch((error) => {
                console.log(error);
            })

        });   

            document.getElementById('simulate').addEventListener('click', (event) => {
            event.preventDefault()

            const requestBody = {
                amount: document.getElementById('amount').value,
                account: document.getElementById('account').value,
            }

            axios.post('/simulate', requestBody)
            .then((response) => {
                console.log(response.data)
            })
            .catch((error) => {
                console.log(error);
            })
        })

</script>

@endsection