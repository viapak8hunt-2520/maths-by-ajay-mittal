<x-mail::message>
# New admission enquiry

**Student:** {{ $enquiry['student_name'] }}

@if (! empty($enquiry['parent_name']))
**Parent / guardian:** {{ $enquiry['parent_name'] }}
@endif

**Phone:** {{ $enquiry['phone'] }}

@if (! empty($enquiry['email']))
**Email:** {{ $enquiry['email'] }}
@endif

**Course / class interest:** {{ $enquiry['course_interest'] }}

**Preferred mode:** {{ ucfirst($enquiry['teaching_mode']) }}

@if (! empty($enquiry['message']))
**Message:**

{{ $enquiry['message'] }}
@endif

Thanks,<br>
{{ config('site.name') }}
</x-mail::message>
