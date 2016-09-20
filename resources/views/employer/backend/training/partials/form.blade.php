<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Title</label>
      <input type="text" class="form-control" name="title" id="title"  placeholder="Title" required>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Location</label>
        <input type="text" class="form-control" name="location" id="location"  placeholder="Kampala" required>
    </div>
</div>
<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Venue</label>
        <input type="text" class="form-control" name="venue" id="venue"  placeholder="Venue of the training" required>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Organisation Name</label>
        <input type="text" class="form-control" name="organisation" id="organisation"  placeholder="Youth Empowerment initiative" required>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Contact Name</label>
      <input type="text" class="form-control" name="contactName" id="contactName"  placeholder="John Kagga" required>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Contact Person Phone Number</label>
        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber"  placeholder="+256789525579" required>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Description</label>
        <input type="text" class="form-control" name="description" id="description"  placeholder="Training description" >
    </div>
</div>
<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Category</label>
        <select name="category" id="category" class="selectpicker" >
            @foreach ($categories as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Date</label>
      <input class="form-control datetime-picker" name="date" id="deadline" type="text" placeholder="YYYY/MM/DD HH:MM:SS" data-mask="0000/00/00 00:00:00">
    </div>
</div>

<br>



