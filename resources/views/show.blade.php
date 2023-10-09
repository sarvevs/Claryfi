@extends('layouts.app')

@section('content')

<body>

<div class="container">


    <form  id="calculate">
        <label for="company">Выберите компанию:</label>
        <select name="company" id="company">
            <option value="transcompany">TransCompany</option>
            <option value="packgroup">PackGroup</option>
        </select>
        <label for="weight">Вес посылки (кг):</label>
        <input type="number" name="weight" id="weight" required>
        <button type="submit">Рассчитать стоимость доставки</button>
    </form>
    <div id="message">
    </div>
</div>
</body>
@endsection
