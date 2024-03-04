@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')

<div class="container">
       
        <div class="row mt-5">
            <div class="col-sm-8 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">Transaction Status Check</div>
                    <div class="card-body">
                        <div id="c2b_response"></div>
                        <form action="">
                            @csrf

                            <div class="form-group">
                                <label for="transactionid">Transaction ID</label>
                                <input type="text" name="transactionid" class="form-control" id="transactionid">
                            </div>
                            <button id="status" class="btn btn-primary mt-5">Check Transaction</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('status').addEventListener('click', (event) => {
        event.preventDefault()

            const requestBody = {
                transactionid: document.getElementById('transactionid').value
            }

            axios.post('check-status', requestBody)
            .then((response) => {
                if(response.data.Result){
                    document.getElementById('c2b_response').innerHTML = response.data.Result.ResultDesc
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
