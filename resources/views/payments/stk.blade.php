@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')

<div class="container">
       
        <div class="row mt-5">
            <div class="col-sm-8 mx-auto">
                <div class="card shadow mt-5">
                    <div class="card-header">Stk Transaction</div>
                    <div class="card-body">
                        <div id="c2b_response"></div>
                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control" id="amount">
                            </div>
                            <div class="form-group mb-5">
                                <label for="account">Account</label>
                                <input type="text" name="account" class="form-control" id="account">
                            </div>
                            <button id="stkpush" class="btn btn-primary">Simulate STK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('stkpush').addEventListener('click', (event) => {
            event.preventDefault()

            const requestBody = {
                amount: document.getElementById('amount').value,
                account: document.getElementById('account').value,
                phone: document.getElementById('phone').value
            }

            axios.post('stkpush', requestBody)
            .then((response) => {
                if(response.data.ResponseDescription){
                    document.getElementById('c2b_response').innerHTML = response.data.ResponseDescription
                } else {
                    document.getElementById('c2b_response').innerHTML = response.data.errorMessage
                }
            })
            .catch((error) => {
                console.log(error);
            })
        })
    </script>

@endsection