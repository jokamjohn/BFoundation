<p><strong>Title :</strong>
    <strong><a href="{{ route('youth.job.show', $job->slug) }}">{{ ucfirst($job->title) }}</a></strong>
</p>

<p class="job_fields"><strong>Description: </strong>
    {{ str_limit($job->description,90,"...") }}
</p>
<p class="job_fields"><strong>Location: </strong>{{ ucfirst($job->location) }}</p>

<p class="job_fields"><strong>Positions: </strong>{{ $job->positions }}</p>

@if(count($job->employer) > 0)
    @foreach($job->employer as $employer)
        <p class="job_fields">
            <strong>Employer: </strong>
            {{ ucfirst($employer->firstName) ." ". ucfirst($employer->lastName) }}
        </p>
    @endforeach
@else
    <p class="job_fields">
        <strong>Employer: </strong>
        Administrator
    </p>

@endif

<p class="job_fields"><strong>Contact: </strong>
    {{ ucfirst($job->contactName) }} <span>{{ $job->contactPhoneNumber }}</span>
</p>

<p class="job_fields"><strong>Deadline: </strong>
    {{ $job->deadline->toDateTimeString() }}
</p>