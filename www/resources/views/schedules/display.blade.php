<table class="table">
    <tr>
        @foreach($data->first()->toArray() as $key => $value)
            <th>
                {{ $key }}
            </th>
        @endforeach
        <th>
            carbon_date_from
        </th>
    </tr>

    @foreach ($data as $item)
        <tr>
            @foreach($item->toArray() as $key => $value)
                <td>
                    {{ $value }}
                </td>
            @endforeach
            <td>
                {{ $item->carbon_date_from }}
            </td>
        </tr>
    @endforeach
</table>