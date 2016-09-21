<p><strong>Title : </strong>
    <a href="{{ route('youth.training.show',$training->slug) }}">{{ ucfirst($training->title) }}</a>
</p>

<p class="job_fields"><strong>Description: </strong>
    {{ str_limit($training->description, 90, "...") }}
</p>
<p class="job_fields"><strong>Location: </strong>{{ ucfirst($training->location) }}</p>

<p class="job_fields"><strong>Organisation: </strong>{{ $training->organisation }}</p>

<p class="job_fields"><strong>Contact: </strong>
    {{ ucfirst($training->contactName) }} <span>{{ $training->phoneNumber }}</span>
</p>

<p class="job_fields"><strong>Date: </strong>
    {{ $training->date->toDateTimeString() }}
</p>