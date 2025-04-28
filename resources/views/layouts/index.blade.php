<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Select a Subscription Plan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Plan</h4>
                    <p class="card-text">$200 per month</p>
                    <button class="btn btn-primary" onclick="selectPlan('basic')">Select Plan</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Premium Plan</h4>
                    <p class="card-text">$200 per month</p>
                    <button class="btn btn-primary" onclick="selectPlan('premium')">Select Plan</button>
                </div>
            </div>
        </div>
    </div>

    <form id="subscription-form" action="{{ url('subscriptions') }}" method="POST" class="mt-4" style="display: none;">
        @csrf
        <input type="hidden" name="plan" id="plan">
        <input type="hidden" name="starts_at" value="{{ now() }}">
        <input type="hidden" name="ends_at" id="ends_at">
        <button type="submit" class="btn btn-success">Subscribe</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function selectPlan(plan) {
        document.getElementById('plan').value = plan;

        const today = new Date();
        const startDate = today.toISOString().split('T')[0]; // YYYY-MM-DD
        document.getElementsByName('starts_at')[0].value = startDate;

        const endDate = new Date(today.setMonth(today.getMonth() + 1)).toISOString().split('T')[0]; // Next month
        document.getElementById('ends_at').value = endDate;

        document.getElementById('subscription-form').style.display = 'block';
    }
</script>

</body>
</html>
