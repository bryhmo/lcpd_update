
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit  Student</h1>
        </div>
       
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-6" >
                    <label> First Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="First Name" name="name" value="{{old('name',$getRecord->name)}}" required>
                    <div style="color: red">{{$errors->first('name')}}</div>
                  </div>
                  <div class="form-group col-md-6" >
                    <label>Last Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{old('last_name',$getRecord->last_name)}}" required>
                    <div style="color: red">{{$errors->first('last_name')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Admission Number <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="Admission Number " name="admission_number" value="{{old('admission_number',$getRecord->admission_number)}}" required>
                    <div style="color: red">{{$errors->first('admission_number')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Role Number <span style="color: red;"></span></label>
                    <input type="text" class="form-control" placeholder="Role Number " name="role_number" value="{{old('role_number',$getRecord->role_number)}}" required>
                    <div style="color: red">{{$errors->first('role_number')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                  <label>Class<span style="color: red;">*</span></label>
                   <select class="form-control" required name="class_id">
                      <option value="">Select Class</option>
                      @foreach ($getClass as $value)
                      <option {{ (old('class_id',$getRecord->class_id) == $value->id) ? 'selected':""}} value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                   </select>
                   <div style="color: red">{{$errors->first('class_id')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                  <label>Gender<span style="color: red;">*</span></label>
                   <select class="form-control" required name="gender">
                      <option  value="">Select Gender</option>
                      <option {{ (old('gender',$getRecord->gender) == 'Male') ? 'selected':""}} value="Male">Male</option>
                      <option {{ (old('gender',$getRecord->gender) == 'Female') ? 'selected':""}} value="Female">Female</option>
                   </select>
                   <div style="color: red">{{$errors->first('gender')}}</div>
                  </div>

                  
                  <div class="form-group col-md-6" >
                    <label>Date of Birth<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth',$getRecord->date_of_birth)}}" required>
                    <div style="color: red">{{$errors->first('date_of_birth')}}</div>
                  </div>
                  

                  <div class="form-group col-md-6" >
                    <label>Nationality<span style="color: red;"></span></label>
                    <input type="text" class="form-control" name="nationality" value="{{old('nationality',$getRecord->nationality)}}" placeholder="Nationality" >
                    <div style="color: red">{{$errors->first('nationality')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label for="states">Select a State: <span style="color: red;">*</span></label>
                    <select id="states"  class="form-control" name="states" onchange="populateLGAs()">
                      <option value="" selected disabled>Select State</option>
                      <option {{ (old('states',$getRecord->states) == 'Abia') ? 'selected':""}} value="Abia">Abia</option>
                      <option {{ (old('states',$getRecord->states) == 'Adamawa') ? 'selected':""}}  value="Adamawa">Adamawa</option>
                      <option {{ (old('states',$getRecord->states) == 'Akwa Ibom') ? 'selected':""}}  value="Akwa Ibom">Akwa Ibom</option>
                      <option {{ (old('states',$getRecord->states) == 'Anambra') ? 'selected':""}}  value="Anambra">Anambra</option>
                      <option {{ (old('states',$getRecord->states) == 'Bauchi') ? 'selected':""}}  value="Bauchi">Bauchi</option>
                      <option {{ (old('states',$getRecord->states) == 'Bayelsa') ? 'selected':""}}  value="Bayelsa">Bayelsa</option>
                      <option {{ (old('states',$getRecord->states) == 'Benue') ? 'selected':""}}  value="Benue">Benue</option>
                      <option {{ (old('states',$getRecord->states) == 'Borno') ? 'selected':""}}  value="Borno">Borno</option>
                      <option {{ (old('states',$getRecord->states) == 'Cross River') ? 'selected':""}}  value="Cross River">Cross River</option>
                      <option {{ (old('states',$getRecord->states) == 'Delta') ? 'selected':""}}  value="Delta">Delta</option>
                      <option {{ (old('states',$getRecord->states) == 'Ebonyi') ? 'selected':""}}  value="Ebonyi">Ebonyi</option>
                      <option {{ (old('states',$getRecord->states) == 'Edo') ? 'selected':""}}  value="Edo">Edo</option>
                      <option {{ (old('states',$getRecord->states) == 'Ekiti') ? 'selected':""}}  value="Ekiti">Ekiti</option>
                      <option {{ (old('states',$getRecord->states) == 'Enugu') ? 'selected':""}}   value="Enugu">Enugu</option>
                      <option {{ (old('states',$getRecord->states) == 'FCT') ? 'selected':""}}  value="FCT">Federal Capital Territory (FCT)</option>
                      <option {{ (old('states',$getRecord->states) == 'Gombe') ? 'selected':""}}  value="Gombe">Gombe</option>
                      <option {{ (old('states',$getRecord->states) == 'Imo') ? 'selected':""}}  value="Imo">Imo</option>
                      <option {{ (old('states',$getRecord->states) == 'Jigawa') ? 'selected':""}}  value="Jigawa">Jigawa</option>
                      <option {{ (old('states',$getRecord->states) == 'Kaduna') ? 'selected':""}}  value="Kaduna">Kaduna</option>
                      <option {{ (old('states',$getRecord->states) == 'Kano') ? 'selected':""}}  value="Kano">Kano</option>
                      <option {{ (old('states',$getRecord->states) == 'Katsina') ? 'selected':""}}  value="Katsina">Katsina</option>
                      <option {{ (old('states',$getRecord->states) == 'Kebbi') ? 'selected':""}}  value="Kebbi">Kebbi</option>
                      <option {{ (old('states',$getRecord->states) == 'Kogi') ? 'selected':""}}  value="Kogi">Kogi</option>
                      <option {{ (old('states',$getRecord->states) == 'Kwara') ? 'selected':""}}  value="Kwara">Kwara</option>
                      <option {{ (old('states',$getRecord->states) == 'Lagos') ? 'selected':""}}  value="Lagos">Lagos</option>
                      <option {{ (old('states',$getRecord->states) == 'Nasarawa') ? 'selected':""}}  value="Nasarawa">Nasarawa</option>
                      <option {{ (old('states',$getRecord->states) == 'Niger') ? 'selected':""}}  value="Niger">Niger</option>
                      <option {{ (old('states',$getRecord->states) == 'Ogun') ? 'selected':""}}  value="Ogun">Ogun</option>
                      <option {{ (old('states',$getRecord->states) == 'Ondo') ? 'selected':""}}  value="Ondo">Ondo</option>
                      <option {{ (old('states',$getRecord->states) == 'Osun') ? 'selected':""}}  value="Osun">Osun</option>
                      <option {{ (old('states',$getRecord->states) == 'Oyo') ? 'selected':""}}  value="Oyo">Oyo</option>
                      <option {{ (old('states',$getRecord->states) == 'Plateau') ? 'selected':""}}  value="Plateau">Plateau</option>
                      <option {{ (old('states',$getRecord->states) == 'Rivers') ? 'selected':""}}  value="Rivers">Rivers</option>
                      <option {{ (old('states',$getRecord->states) == 'Sokoto') ? 'selected':""}}  value="Sokoto">Sokoto</option>
                      <option {{ (old('states',$getRecord->states) == 'Taraba') ? 'selected':""}}  value="Taraba">Taraba</option>
                      <option {{ (old('states',$getRecord->states) == 'Yobe') ? 'selected':""}}  value="Yobe">Yobe</option>
                      <option {{ (old('states',$getRecord->states) == 'Zamfara') ? 'selected':""}}  value="Zamfara">Zamfara</option>
                    </select>
                 </div>

                <div class="form-group col-md-6" >
                  <label for="lgas">Select a Local Government Area:<span style="color: red;">*</span></label>
                  <select id="lgas" class="form-control" required name="lgas" value="{{old('lgas',$getRecord->lgas )}}">
                    <option value=" "selected disabled>Select Local Government</option>
                  </select>
                </div>
                <div class="form-group col-md-6" >
                  <label>Religion<span style="color: red;"></span></label>
                  <input type="text" class="form-control" name="religion" value="{{old('religion',$getRecord->religion)}}" placeholder="Religion" >
                  <div style="color: red">{{$errors->first('religion')}}</div>

                </div>

                <div class="form-group col-md-6" >
                  <label>Mobile Number<span style="color: red;"></span></label>
                  <input type="text" class="form-control" name="mobile_number" value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Mobile Number" >
                  <div style="color: red">{{$errors->first('mobile_number')}}</div>

                </div>

                <div class="form-group col-md-6" >
                  <label>Admission Date<span style="color: red;">*</span></label>
                  <input type="date" class="form-control" name="admission_date" value="{{old('admission_date',$getRecord->admission_date)}}" required >
                  <div style="color: red">{{$errors->first('admission_date')}}</div>

                </div>

                <div class="form-group col-md-6" >
                  <label>Profile Pic<span style="color: red;"></span></label>
                  <input type="file" class="form-control" name="profile_pic">
                  <div style="color: red">{{$errors->first('profile_pic')}}</div>

                  @if (!empty($getRecord->getProfile()))
                  <img src="{{$getRecord->getProfile()}}" style="width:auto;height:50px;">  
                  @endif
                </div>


                <div class="form-group col-md-6" >
                  <label>Blood Group<span style="color: red;"></span></label>
                  <input type="text" class="form-control" value="{{old('blood_group',$getRecord->blood_group)}}" name="blood_group" placeholder="Blood Group">
                  <div style="color: red">{{$errors->first('blood_group')}}</div>
                  
                </div>


                  <div class="form-group col-md-6" >
                    <label>Height<span style="color: red;"></span></label>
                    <input type="text" class="form-control"  value="{{old('height',$getRecord->height)}}"  name="height" placeholder="Height">
                  <div style="color: red">{{$errors->first('height')}}</div>
                    
                  </div>


                  <div class="form-group col-md-6" >
                    <label>Weight<span style="color: red;"></span></label>
                    <input type="text" class="form-control"  value="{{old('weight',$getRecord->weight)}}"  name="weight" placeholder="Weight">
                  <div style="color: red">{{$errors->first('weight')}}</div>

                  </div>

                  <div class="form-group col-md-6" >
                    <label>Status<span style="color: red;">*</span></label>
                     <select class="form-control" required name="status">
                        <option  value="">Select Status</option>
                        <option {{ (old('status',$getRecord->status) == 0) ? 'selected':""}}  value="0">Active</option>
                        <option {{ (old('status',$getRecord->status) == 1) ? 'selected':""}}  value="1">Inactive</option>
                     </select>
                    </div>
                </div>

                <hr />
                <div class="form-group">
                  <label>Email <span style="color: red;">*</span></label>
                  <input type="email" class="form-control"  placeholder="Email" name="email" value="{{old('email',$getRecord->email)}}" required>
                  <div style="color: red">{{$errors->first('email')}}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password <span style="color: red;"></span></label>
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  <p style="color: green">Do You Want to Change Password Please Add new Password</p>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>


<script>
   
    const lgasByState = {
      "Abia": ["Aba North", "Aba South", "Arochukwu", "Bende", "Ikwuano", "Isiala Ngwa North", "Isiala Ngwa South", "Isuikwuato", "Obi Ngwa", "Ohafia", "Osisioma", "Ugwunagbo", "Ukwa East", "Ukwa West", "Umuahia North", "Umuahia South", "Umu Nneochi"],
      "Adamawa": ["Demsa", "Fufore", "Ganye", "Girei", "Gombi", "Guyuk", "Hong", "Jada", "Lamurde", "Madagali", "Maiha", "Mayo-Belwa", "Michika", "Mubi North", "Mubi South", "Numan", "Shelleng", "Song", "Toungo", "Yola North", "Yola South"],
      "Akwa Ibom": ["Abak", "Eastern Obolo", "Eket", "Esit Eket", "Essien Udim", "Etim Ekpo", "Etinan", "Ibeno", "Ibesikpo Asutan", "Ibiono-Ibom", "Ika", "Ikono", "Ikot Abasi", "Ikot Ekpene", "Ini", "Itu", "Mbo", "Mkpat-Enin", "Nsit-Atai", "Nsit-Ibom", "Nsit-Ubium", "Obot Akara", "Okobo", "Onna", "Oron", "Oruk Anam", "Udung-Uko", "Ukanafun", "Uruan", "Urue-Offong/Oruko", "Uyo"],
      "Anambra": ["Aguata", "Anambra East", "Anambra West", "Anaocha", "Awka North", "Awka South", "Ayamelum", "Dunukofia", "Ekwusigo", "Idemili North", "Idemili South", "Ihiala", "Njikoka", "Nnewi North", "Nnewi South", "Ogbaru", "Onitsha North", "Onitsha South", "Orumba North", "Orumba South", "Oyi"],
      "Bauchi": ["Alkaleri", "Bauchi", "Bogoro", "Damban", "Darazo", "Dass", "Gamawa", "Ganjuwa", "Giade", "Itas/Gadau", "Jama'are", "Katagum", "Kirfi", "Misau", "Ningi", "Shira", "Tafawa Balewa", "Toro", "Warji", "Zaki"],
      "Bayelsa": ["Brass", "Ekeremor", "Kolokuma/Opokuma", "Nembe", "Ogbia", "Sagbama", "Southern Ijaw", "Yenagoa"],
      "Benue": ["Ado", "Agatu", "Apa", "Buruku", "Gboko", "Guma", "Gwer East", "Gwer West", "Katsina-Ala", "Konshisha", "Kwande", "Logo", "Makurdi", "Obi", "Ogbadibo", "Ohimini", "Oju", "Okpokwu", "Otukpo", "Tarka", "Ukum", "Ushongo", "Vandeikya"],
      "Borno": ["Abadam", "Askira/Uba", "Bama", "Bayo", "Biase", "Chibok", "Damboa", "Dikwa", "Gubio", "Guzamala", "Gwoza", "Hawul", "Jere", "Kaga", "Kala/Balge", "Konduga", "Kukawa", "Kwaya Kusar", "Mafa", "Magumeri", "Maiduguri", "Marte", "Mobbar", "Monguno", "Ngala", "Nganzai", "Shani"],
      "Cross River": ["Abi", "Akamkpa", "Akpabuyo", "Bakassi", "Bekwarra", "Biase", "Boki", "Calabar Municipal", "Calabar South", "Etung", "Ikom", "Obanliku", "Obubra", "Obudu", "Odukpani", "Ogoja", "Yakuur", "Yala"],
      "Delta": ["Aniocha North", "Aniocha South", "Bomadi", "Burutu", "Ethiope East", "Ethiope West", "Ika North East", "Ika South", "Isoko North", "Isoko South", "Ndokwa East", "Ndokwa West", "Okpe", "Oshimili North", "Oshimili South", "Patani", "Sapele", "Udu", "Ughelli North", "Ughelli South", "Ukwuani", "Uvwie", "Warri North", "Warri South", "Warri South West"],
      "Ebonyi": ["Abakaliki", "Afikpo North", "Afikpo South", "Ebonyi", "Ezza North", "Ezza South", "Ikwo", "Ishielu", "Ivo", "Izzi", "Ohaozara", "Ohaukwu", "Onicha"],
      "Edo": ["Akoko-Edo", "Egor", "Esan Central", "Esan North-East", "Esan South-East", "Esan West", "Etsako Central", "Etsako East", "Etsako West", "Igueben", "Ikpoba-Okha", "Oredo", "Orhionmwon", "Ovia North-East", "Ovia South-West", "Owan East", "Owan West", "Uhunmwonde"],
      "Ekiti": ["Ado Ekiti", "Efon", "Ekiti East", "Ekiti South-West", "Ekiti West", "Emure", "Gbonyin", "Ido-Osi", "Ijero", "Ikere", "Ikole", "Ilejemeje", "Irepodun/Ifelodun", "Ise/Orun", "Moba", "Oye"],
      "Enugu": ["Aninri", "Awgu", "Enugu East", "Enugu North", "Enugu South", "Ezeagu", "Igbo Etiti", "Igbo Eze North", "Igbo Eze South", "Isi Uzo", "Nkanu East", "Nkanu West", "Nsukka", "Oji River", "Udenu", "Udi", "Uzo-Uwani"],
      "FCT": ["Abaji", "Abuja Municipal", "Bwari", "Gwagwalada", "Kuje", "Kwali"],
      "Gombe": ["Akko", "Balanga", "Billiri", "Dukku", "Funakaye", "Gombe", "Kaltungo", "Kwami", "Nafada", "Shongom", "Yamaltu/Deba"],
      "Imo": ["Aboh Mbaise", "Ahiazu Mbaise", "Ehime Mbano", "Ezinihitte", "Ideato North", "Ideato South", "Ihitte/Uboma", "Ikeduru", "Isiala Mbano", "Isu", "Mbaitoli", "Ngor Okpala", "Njaba", "Nkwerre", "Nwangele", "Obowo", "Oguta", "Ohaji/Egbema", "Okigwe", "Orlu", "Orsu", "Oru East", "Oru West", "Owerri Municipal", "Owerri North", "Owerri West", "Unuimo"],
      "Jigawa": ["Auyo", "Babura", "Biriniwa", "Birnin Kudu", "Buji", "Dutse", "Gagarawa", "Garki", "Gumel", "Guri", "Gwaram", "Gwiwa", "Hadejia", "Jahun", "Kafin Hausa", "Kazaure", "Kiri Kasama", "Kiyawa", "Kaugama", "Maigatari", "Malam Madori", "Miga", "Ringim", "Roni", "Sule Tankarkar", "Taura", "Yankwashi"],
      "Kaduna": ["Birnin Gwari", "Chikun", "Giwa", "Igabi", "Ikara", "Jaba", "Jema'a", "Kachia", "Kaduna North", "Kaduna South", "Kagarko", "Kajuru", "Kaura", "Kauru", "Kubau", "Kudan", "Lere", "Makarfi", "Sabon Gari", "Sanga", "Soba", "Zangon Kataf", "Zaria"],
      "Kano": ["Ajingi", "Albasu", "Bagwai", "Bebeji", "Bichi", "Bunkure", "Dala", "Dambatta", "Dawakin Kudu", "Dawakin Tofa", "Doguwa", "Fagge", "Gabasawa", "Garko", "Garun Mallam", "Gaya", "Gezawa", "Gwale", "Gwarzo", "Kabo", "Kano Municipal", "Karaye", "Kibiya", "Kiru", "Kumbotso", "Kunchi", "Kura", "Madobi", "Makoda", "Minjibir", "Nasarawa", "Rano", "Rimin Gado", "Rogo", "Shanono", "Sumaila", "Takai", "Tarauni", "Tofa", "Tsanyawa", "Tudun Wada", "Ungogo", "Warawa", "Wudil"],
      "Katsina": ["Bakori", "Batagarawa", "Batsari", "Baure", "Bindawa", "Charanchi", "Dan Musa", "Dandume", "Danja", "Daura", "Dutsi", "Dutsin-Ma", "Faskari", "Funtua", "Ingawa", "Jibia", "Kafur", "Kaita", "Kankara", "Kankia", "Katsina", "Kurfi", "Kusada", "Mai'Adua", "Malumfashi", "Mani", "Mashi", "Matazu", "Musawa", "Rimi", "Sabuwa", "Safana", "Sandamu", "Zango"],
      "Kebbi": ["Aleiro", "Arewa Dandi", "Argungu", "Augie", "Bagudo", "Birnin Kebbi", "Bunza", "Dandi", "Fakai", "Gwandu", "Jega", "Kalgo", "Koko/Besse", "Maiyama", "Ngaski", "Sakaba", "Shanga", "Suru", "Wasagu/Danko", "Yauri", "Zuru"],
      "Kogi": ["Adavi", "Ajaokuta", "Ankpa", "Bassa", "Dekina", "Ibaji", "Idah", "Igalamela Odolu", "Ijumu", "Kabba/Bunu", "Kogi", "Lokoja", "Mopa Muro", "Ofu", "Ogori/Magongo", "Okehi", "Okene", "Olamaboro", "Omala", "Yagba East", "Yagba West"],
      "Kwara": ["Asa", "Baruten", "Edu", "Ekiti", "Ifelodun", "Ilorin East", "Ilorin South", "Ilorin West", "Irepodun", "Isin", "Kaiama", "Moro", "Offa", "Oke Ero", "Oyun", "Pategi"],
      "Lagos": ["Agege", "Ajeromi-Ifelodun", "Alimosho", "Amuwo-Odofin", "Apapa", "Badagry", "Epe", "Eti-Osa", "Ibeju-Lekki", "Ifako-Ijaiye", "Ikeja", "Ikorodu", "Kosofe", "Lagos Island", "Lagos Mainland", "Mushin", "Ojo", "Oshodi-Isolo", "Shomolu", "Surulere"],
      "Nasarawa": ["Awe", "Doma", "Karu", "Keana", "Keffi", "Kokona", "Lafia", "Nasarawa", "Nasarawa Egon", "Obi", "Toto", "Wamba"],
      "Niger": ["Agaie", "Agwara", "Bida", "Borgu", "Bosso", "Chanchaga", "Edati", "Gbako", "Gurara", "Katcha", "Kontagora", "Lapai", "Lavun", "Magama", "Mariga", "Mashegu", "Mokwa", "Munya", "Paikoro", "Rafi", "Rijau", "Shiroro", "Suleja", "Tafa", "Wushishi"],
      "Ogun": ["Abeokuta North", "Abeokuta South", "Ado-Odo/Ota", "Egbado North", "Egbado South", "Ewekoro", "Ifo", "Ijebu East", "Ijebu North", "Ijebu North East", "Ijebu Ode", "Ikenne", "Imeko Afon", "Ipokia", "Obafemi Owode", "Odeda", "Odogbolu", "Ogun Waterside", "Remo North", "Shagamu"],
      "Ondo": ["Akoko North-East", "Akoko North-West", "Akoko South-West", "Akoko South-East", "Akure North", "Akure South", "Ese Odo", "Idanre", "Ifedore", "Ilaje", "Ile Oluji/Okeigbo", "Irele", "Odigbo", "Okitipupa", "Ondo East", "Ondo West", "Ose", "Owo"],
      "Osun": ["Atakunmosa East", "Atakunmosa West", "Aiyedaade", "Aiyedire", "Boluwaduro", "Boripe", "Ede North", "Ede South", "Ife Central", "Ife East", "Ife North", "Ife South", "Egbedore", "Ejigbo", "Ifedayo", "Ifelodun", "Ila", "Ilesa East", "Ilesa West", "Irepodun", "Irewole", "Isokan", "Iwo", "Obokun", "Odo Otin", "Ola Oluwa", "Olorunda", "Oriade", "Orolu", "Osogbo"],
      "Oyo": ["Afijio", "Akinyele", "Atiba", "Atisbo", "Egbeda", "Ibadan North", "Ibadan North-East", "Ibadan North-West", "Ibadan South-East", "Ibadan South-West", "Ibarapa Central", "Ibarapa East", "Ibarapa North", "Ido", "Irepo", "Iseyin", "Itesiwaju", "Iwajowa", "Kajola", "Lagelu", "Ogbomosho North", "Ogbomosho South", "Ogo Oluwa", "Olorunsogo", "Oluyole", "Ona Ara", "Orelope", "Ori Ire", "Oyo East", "Oyo West", "Saki East", "Saki West", "Surulere"],
      "Plateau": ["Barkin Ladi", "Bassa", "Bokkos", "Jos East", "Jos North", "Jos South", "Kanam", "Kanke", "Langtang North", "Langtang South", "Mangu", "Mikang", "Pankshin", "Qua'an Pan", "Riyom", "Shendam", "Wase"],
      "Rivers": ["Abua/Odual", "Ahoada East", "Ahoada West", "Akuku-Toru", "Andoni", "Asari-Toru", "Bonny", "Degema", "Eleme", "Emuoha", "Etche", "Gokana", "Ikwerre", "Khana", "Obio/Akpor", "Ogba/Egbema/Ndoni", "Ogu/Bolo", "Okrika", "Omuma", "Opobo/Nkoro", "Oyigbo", "Port Harcourt", "Tai"],
      "Sokoto": ["Binji", "Bodinga", "Dange Shuni", "Gada", "Goronyo", "Gudu", "Gwadabawa", "Illela", "Isa", "Kebbe", "Kware", "Rabah", "Sabon Birni", "Shagari", "Silame", "Sokoto North", "Sokoto South", "Tambuwal", "Tangaza", "Tureta", "Wamako", "Wurno", "Yabo"],
      "Taraba": ["Ardo Kola", "Bali", "Donga", "Gashaka", "Gassol", "Ibi", "Jalingo", "Karim Lamido", "Kumi", "Lau", "Sardauna", "Takum", "Ussa", "Wukari", "Yorro", "Zing"],
      "Yobe": ["Bade", "Bursari", "Damaturu", "Fika", "Fune", "Geidam", "Gujba", "Gulani", "Jakusko", "Karasuwa", "Machina", "Nangere", "Nguru", "Potiskum", "Tarmuwa", "Yunusari", "Yusufari"],
      "Zamfara": ["Anka", "Bakura", "Birnin Magaji/Kiyaw", "Bukkuyum", "Bungudu", "Gummi", "Gusau", "Kaura Namoda", "Maradun", "Maru", "Shinkafi", "Talata Mafara", "Chafe", "Zurmi"]
    };

    function populateLGAs() {
      const stateSelect = document.getElementById("states");
      const lgaSelect = document.getElementById("lgas");
      const selectedState = stateSelect.value;

      lgaSelect.innerHTML = '<option value="" selected disabled>Select Local Government</option>';

      if (selectedState && lgasByState[selectedState]) {
        lgasByState[selectedState].forEach(function (lga) {
          const option = document.createElement("option");
          option.text = lga;
          option.value = lga;
          lgaSelect.appendChild(option);
        });
      }
    }
 
</script>
@endsection