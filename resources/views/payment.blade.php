@extends('layouts.main')
    @section('pageTitle', 'Requirements')

    @section('content')
    <div class="container">
       
        <div class="row mt-5">
            <div class="col-sm-6 mx-auto">
                <div class="card mt-2 mb-5">
                    <div class="card-header"><b><h3>Pay</h3></b></div>
                    <div class="card-body">
                        <div id="c2b_response"></div>
                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="account">Name</label>
                                <input type="text" name="account" class="form-control" id="account">
                            </div>

                            <div class="form-group">
                                <label for="amount">Enter your phone number</label>
                                <input type="number" name="amount" class="form-control" id="amount">
                            </div>
                            
                            <button id="simulate" class="btn btn-primary lg shadow me-2">pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('simulate').addEventListener('click', (event) => {
            event.preventDefault()

            const requestBody = {
                amount: document.getElementById('amount').value,
                account: document.getElementById('account').value
            }

            axios.post('/get-token', {})
            .then((response) => {
               console.log(response);
            })
            .catch((error) => {
                console.log(error);
            })
        })
    </script>

@endsection