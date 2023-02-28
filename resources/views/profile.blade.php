@extends('layouts.app')

@section('content')
<profile-panel :trainer="'{{ $user_id }}'" />
@endsection
