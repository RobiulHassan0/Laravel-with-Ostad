{{-- @if($result === 100)
    <h1>Result is Hundred</h1>
@elseif($result === 1000)
    <h1>Result is Thousand</h1>
@elseif($result == 100000)
    <h2>Result is lac</h2>
@else
    <h2>Result is not our range</h2>

@endif --}}

@switch($result)
    @case(100)
        <h2>Result is Hundred</h2>
        @break
    @case(1000)
        <h2>Result is Thousand</h2>
        @break
    @case(100000)
        <h2>Result is lac</h2>
        @break
    @default
        <h1>Result is not our range</h1>

@endswitch
