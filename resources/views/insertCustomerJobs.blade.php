<form action="{{route('customers.insertCustomerJobsPost')}}" method="post">
    @csrf
    Customer: <select name="customer">
        @foreach($data['customers'] as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>
<br><br>
    Jobs: <select name="jobs[]" multiple>
        @foreach($data['jobs'] as $job)
            <option value="{{$job->id}}">{{$job->name}}</option>
        @endforeach
    </select>
    <br><br>
    <input type="submit" name="save" value="save">
</form>
