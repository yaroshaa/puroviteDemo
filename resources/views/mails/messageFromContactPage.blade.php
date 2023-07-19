@component('mail::message')
@if(isset($institution))
<table width="100%" cellspacing="0" cellpadding="4">
<tbody>
<tr>
<td><a href="https://eduopinions.pipedrive.com/organization/{{ $institution->pipedrive_id }}" target="_blank">{{ $institution->name }}</a></td>
<td>{{ config('pipedrive.fields.contract_plan_options.'.$institution->contract_plan) }}</td>
<td>{{ $institution->contract_end_date->format('d/m/Y')}}</td>
</tr>
</tbody>
</table>
@else
<h3>There are no contracts matching the request parameters</h3><h3></h3>
@endif
@endcomponent
