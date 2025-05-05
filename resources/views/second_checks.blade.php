@extends('layouts.admin')

@section('content')
    <div class="container-">
        <div class="card mb-4">
            <div class="card-header"> 
                <h5 class="m-0">Acknowledgements - Step</h5>
            </div>
            <div class="card-body">
            <p>You have to adhere/check the following options before moving to next step</p>
            <p>The undersigned undertakes that</p>
                <form action="{{ route('storeSecondChecks') }}" method="POST" id="applicantForm">
                    @csrf
                
                    <div class="mb-3 form-check">
                        <input style="margin-top: 11px;" type="checkbox" id="punjab_resident" name="punjab_resident" class="form-check-input" value="1" 
                            {{ old('punjab_resident') ? 'checked' : '' }}>
                            <label for="punjab_resident" class="col-form-label ms-2 mb-2 urduLbl">You are resident of Punjab.<span class="urdu-lbl">آپ پنجاب کے رہنے والے ہیں۔</span></label>
                        @error('punjab_resident')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input style="margin-top: 11px;" type="checkbox" id="same_district_application" name="same_district_application" class="form-check-input" value="1"
                            {{ old('same_district_application') ? 'checked' : '' }}>
                            <label for="same_district_application" class="col-form-label ms-2 mb-2 urduLbl">You are residing in the same district in which you have applied.<span class="urdu-lbl">آپ اسی ضلع میں مقیم ہیں جس کے لیے آپ نے درخواست دی ہے۔</span></label>
                        @error('same_district_application')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input style="margin-top: 11px;" type="checkbox" id="no_plot_associated" name="no_plot_associated" class="form-check-input" value="1"
                            {{ old('no_plot_associated') ? 'checked' : '' }}>
                            <label for="no_plot_associated" class="col-form-label ms-2 mb-2 urduLbl">You do not own any plot or house.<span class="urdu-lbl">آپ کی ملکیت میں کوئی پلاٹ یا مکان نہیں ہے۔</span></label>
                        @error('no_plot_associated')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input style="margin-top: 11px;" type="checkbox" id="not_blacklisted" name="not_blacklisted" class="form-check-input" value="1"
                            {{ old('not_blacklisted') ? 'checked' : '' }}>
                        <label for="not_blacklisted" class="col-form-label ms-2 mb-2 urduLbl">You are not blacklisted from any financial institution.<span class="urdu-lbl">آپ کو کسی مالیاتی ادارے سے بلیک لسٹ نہیں کیا گیا ہے۔</span></label>
                        @error('not_blacklisted')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input style="margin-top: 11px;" type="checkbox" id="no_criminal_record" name="no_criminal_record" class="form-check-input" value="1"
                            {{ old('no_criminal_record') ? 'checked' : '' }}>
                            <label for="no_criminal_record" class="col-form-label ms-2 mb-2 urduLbl">You do not have any criminal record.<span class="urdu-lbl">آپ کا کوئی مجرمانہ ریکارڈ نہیں ہے۔</span></label>
                            
                        @error('no_criminal_record')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            
        </div>
        </div>
    </div>
@endsection