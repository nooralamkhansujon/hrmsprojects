<template>
  <!-- content header  -->
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Employee Information</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dasbhoard</router-link>
              </li>
               <li class="breadcrumb-item">
                <router-link :to="{ name: 'ViewEmployee' }">Employee List</router-link>
              </li>
              <li class="breadcrumb-item active">Add Employee</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
            </div>
        </div>
    </div> -->
  </div>
  <!-- end of content header  -->
  <div class="content-body">
    <!-- Horizontal Wizard -->
    <section class="horizontal-wizard">
      <div class="bs-stepper horizontal-wizard-example">
        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">1</span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Employee Details</span>
                <span class="bs-stepper-subtitle">Set upEmployee Details</span>
              </span>
            </button>
          </div>
          <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
          </div>
          <div class="step" data-target="#personal-info">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">2</span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Training Details</span>
                <span class="bs-stepper-subtitle">Set up Training Details</span>
              </span>
            </button>
          </div>
          <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
          </div>
          <div class="step" data-target="#address-step">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">3</span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Experience Details</span>
                <span class="bs-stepper-subtitle">Add Experience</span>
              </span>
            </button>
          </div>
          <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
          </div>
          <div class="step" data-target="#social-links">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">4</span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Promotion Details</span>
                <span class="bs-stepper-subtitle">set up Promotion Details</span>
              </span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          <div id="account-details" class="content">
            <div class="content-header">
              <h5 class="mb-0">Employee Details</h5>
              <small class="text-muted">Enter Employee Details.</small>
            </div>
            <form enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="employee_name">Employee Name</label>
                  <input
                    type="text"
                    v-model="form.employee_name"
                    name="employee_name"
                    id="employee_name"
                    class="form-control"
                    placeholder="johndoe"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="email">Employee Department</label>

                  <select
                    class="form-control"
                    v-model="form.employee_department"
                    name="employee_department"
                    id="employee_department"
                  >
                    <option selected disabled>Select Department</option>
                    <option
                      v-for="(department, index) in departmentList"
                      :key="index"
                      :value="department.id"
                    >
                      {{ department.department_name }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="employee_designation"
                    >Employee Designation</label
                  >
                  <input
                    type="text"
                    v-model="form.employee_designation"
                    id="employee_designation"
                    name="employee_designation"
                    class="form-control"
                    placeholder="Enter Designation"
                  />
                </div>
                <div class="form-group col-md-6">
                  <div class="custom-control custom-checkbox mt-2">
                    <input
                      class="custom-control-input"
                      type="checkbox"
                      v-model="form.employee_status"
                      id="employee_status"
                      name="employee_status"
                      tabindex="3"
                    />
                    <label class="custom-control-label" for="employee_status">
                      Employee Status
                    </label>
                  </div>
                </div>

              </div>
              <!-- basic salary and gross salary -->
              <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="employee_type">
                      Employee Type
                    </label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="form.employee_type"
                      id="employee_type"
                      name="employee_type"
                      tabindex="3"
                    />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="basic_salary">Basic Salary</label>
                  <input
                    type="text"
                    v-model="form.basic_salary"
                    name="basic_salary"
                    id="basic_salary"
                    class="form-control"
                    placeholder="Enter Basic Salary"
                  />
                </div>

              </div>
              <!-- end of basic salary and gross salary fields -->

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="gross_salary">gross Salary</label>
                  <input
                    type="text"
                    v-model="form.gross_salary"
                    name="gross_salary"
                    id="gross_salary"
                    class="form-control"
                    placeholder="Enter Gross Salary"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="tin">Tin Number</label>
                  <input
                    type="text"
                    v-model="form.tin"
                    name="tin"
                    id="tin"
                    class="form-control"
                    placeholder="Enter Tin Number"
                  />
                </div>

              </div>
              <!-- mobile number and emergency mobile number  -->
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="employee_image">Employee Image</label>
                  <input
                    type="file"
                    name="employee_image"
                    @change="AddEmployeeImage"
                    id="employee_image"
                    class="form-control"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="mobile_number"> Mobile Number </label>
                  <input
                    type="integer"
                    v-model="form.mobile_number"
                    name="mobile_number"
                    id="mobile_number"
                    class="form-control"
                    placeholder="Enter mobile number"
                  />
                </div>

              </div>
              <!-- email and Joining date -->
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="emergency_mobile_number"
                    >Emergency Mobile Number</label
                  >
                  <input
                    type="integer"
                    v-model="form.emergency_mobile_number"
                    name="emergency_mobile_number"
                    id="emergency_mobile_number"
                    class="form-control"
                    placeholder="Emergency mobile number"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="email"> Email </label>
                  <input
                    v-model="form.email"
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter Email"
                  />
                </div>

              </div>
              <!-- father and mother -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="joining_date">Joining Date</label>
                  <input
                    v-model="form.joining_date"
                    type="text"
                    name="joining_date"
                    class="form-control flatpickr-basic flatpickr-input"
                    placeholder="YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="father_name"> Father Name </label>
                  <input
                    v-model="form.father_name"
                    type="text"
                    name="father_name"
                    id="father_name"
                    class="form-control"
                    placeholder="Enter Father Name"
                  />
                </div>

              </div>
              <!-- nid_number and religion -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="mother_name">Mother Name</label>
                  <input
                    v-model="form.mother_name"
                    type="text"
                    id="mother_name"
                    name="mother_name"
                    class="form-control"
                    placeholder="Mother Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="nid"> National id Number </label>
                  <input
                    v-model="form.nid"
                    type="text"
                    name="nid"
                    id="nid"
                    class="form-control"
                    placeholder="National Id Number"
                  />
                </div>
              </div>
              <!-- blood_group and gender -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="religion">Religion</label>
                  <select class="custom-select" id="religion" name="religion" v-model="form.religion">
                    <option selected>Select Religion</option>
                    <option value="islam">Islam</option>
                    <option value="hinduism">Hinduism</option>
                    <option value="buddhism">Buddhism</option>
                    <option value="christianity">Christianity</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="blood_group"> Blood Group </label>
                  <select
                    class="custom-select"
                    id="blood_group"
                    name="blood_group"
                    v-model="form.blood_group"
                  >
                    <option selected="">Select Blood Group</option>
                    <option value="A">A+</option>
                    <option value="B">B+</option>
                    <option value="AB">AB+</option>
                    <option value="O">O+</option>
                    <option value="O-">O-</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                  </select>
                </div>
              </div>
              <!-- blood_group and gender -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="gender">Gender</label>
                  <select v-model="form.gender" class="custom-select" name="gender" id="gender">
                    <option selected="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="bank_name"> Bank Name </label>
                  <input
                    v-model="form.bank_name"
                    type="text"
                    name="bank_name"
                    id="bank_name"
                    class="form-control"
                    placeholder="Bank Name"
                  />
                </div>
              </div>
              <!-- blood_group and gender -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="bank_account_number"
                    >Bank Account Number</label
                  >
                  <input
                    v-model="form.bank_account_number"
                    type="text"
                    name="bank_account_number"
                    id="bank_account_number"
                    class="form-control"
                    placeholder="Bank Name"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="permanent_address"
                    >Permanent Address</label
                  >
                  <textarea
                    v-model="form.permanent_address"
                    class="form-control"
                    id="permanent_address"
                    name="permanent_address"
                    rows="3"
                    placeholder="Permanent Address"
                  ></textarea>
                </div>


              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="present_address">present Address</label>
                  <textarea
                    v-model="form.present_address"
                    class="form-control"
                    id="present_address"
                    name="present_address"
                    rows="3"
                    placeholder="present Address"
                  >
                  </textarea>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="weekly_off_day"> Weekly Off day </label>
                  <select
                    v-model="form.weekly_off_day"
                    class="custom-select"
                    name="weekly_off_day"
                    id="customSelect"
                  >
                    <option selected="">Select day</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                  </select>
                </div>


              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="education_level"
                    >Last Education Level</label
                  >
                  <input
                    v-model="form.education__eduction_level"
                    type="text"
                    name="education__eduction_level"
                    id="education__eduction_level"
                    class="form-control"
                    placeholder="Last Education Level"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="major_group"
                    >Education Major Group</label
                  >
                  <input
                    v-model="form.education__major_group"
                    type="text"
                    name="education__major_group"
                    id="education__major_group"
                    class="form-control"
                    placeholder="Education Major Group"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="result_type"
                    >Education Result Type</label
                  >
                  <input
                    v-model="form.education__result_type"
                    type="text"
                    name="education__result_type"
                    id="education__result_type"
                    class="form-control"
                    placeholder="Education Result Type"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="result">Education Result</label>
                  <input
                    v-model="form.education__result"
                    type="text"
                    name="education__result"
                    id="education__result"
                    class="form-control"
                    placeholder="Education Result"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="passing_year"
                    >Education Passing Year
                  </label>
                  <input
                    v-model="form.education__passing_year"
                    type="text"
                    name="education__passing_year"
                    id="education__passing_year"
                    class="form-control"
                    placeholder="Education Passing Year"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="fp-range">Education Duration</label>
                  <input
                    v-model="form.education__duration"
                    type="text"
                    id="fp-range"
                    name="education__duration"
                    class="form-control"
                    placeholder="Education Duration"
                  />
                </div>
              </div>
              <!-- relative  -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="education__country"
                    >Education Country
                  </label>
                  <input
                    v-model="form.education__country"
                    class="form-control"
                    id="education__country"
                    name="education__country"
                    rows="3"
                    placeholder="Education Country"
                  >
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="education__institute"
                    >Education Institute
                  </label>
                  <input
                    v-model="form.education__institute"
                    class="form-control"
                    id="education__institute"
                    name="education__institute"
                    rows="3"
                    placeholder="Education Institute"
                  >
                </div>


              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="achievement"
                    >Education Achievement
                  </label>
                  <textarea
                    v-model="form.education__achievement"
                    class="form-control"
                    id="education__achievement"
                    name="education__achievement"
                    rows="3"
                    placeholder="Achievement"
                  >
                  </textarea>
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="name">Relative Name </label>
                  <input
                    v-model="form.relative__name"
                    type="text"
                    name="relative__name"
                    id="relative__name"
                    class="form-control"
                    placeholder="Relative Name"
                  />
                </div>

              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="relation_type">Relative Type</label>
                  <input
                    v-model="form.relative__relation_type"
                    type="text"
                    name="relative__relation_type"
                    id="relative__relation_type"
                    class="form-control"
                    placeholder="Relation Type"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="occupation">Relative Occuption </label>
                  <input
                    v-model="form.relative__occupation"
                    type="text"
                    name="relative__occupation"
                    id="relative__occupation"
                    class="form-control"
                    placeholder="Relative Occupation"
                  />
                </div>


              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="relgender">Relative Gender</label>
                  <select
                    v-model="form.relative__gender"
                    class="custom-select"
                    id="relative__gender"
                    name="relative__gender"
                  >
                    <option selected="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="col-md-6 form-group">
                  <label class="form-label" for="reladdress">Relative Address</label>
                  <textarea
                    v-model="form.relative__address"
                    name="relative__address"
                    id="relative__address"
                    class="form-control"
                    placeholder="Relative Address"
                  ></textarea>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="relcontact_number"
                    >Relative Contact Number</label
                  >
                  <input
                    v-model="form.relative__contact_number"
                    type="text"
                    name="relative__contact_number"
                    id="relative__contact_number"
                    class="form-control"
                    placeholder="Relative Contact Number"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="name">Reference Name</label>
                  <input
                    v-model="form.reference__name"
                    type="text"
                    name="reference__name"
                    id="reference__name"
                    class="form-control"
                    placeholder="Reference Name"
                  />
                </div>

              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="organization"
                    >Reference Organization</label
                  >
                  <input
                    v-model="form.reference__organization"
                    type="text"
                    name="reference__organization"
                    id="reference__organization"
                    class="form-control"
                    placeholder="Reference Organization"
                  />
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="refrelation">Reference Relation</label>
                  <input
                    v-model="form.reference__relation"
                    type="text"
                    name="reference__relation"
                    id="reference__relation"
                    class="form-control"
                    placeholder="Reference Relation"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="refaddress">Reference Address</label>
                  <textarea
                    v-model="form.reference__address"
                    class="form-control"
                    id="reference__address"
                    name="reference__address"
                    rows="3"
                    placeholder="Reference address"
                  ></textarea>
                </div>
                <div class="col-md-6 form-group">
                  <label class="form-label" for="refemail">Reference Email</label>
                  <input
                    v-model="form.reference__email"
                    type="text"
                    name="reference__email"
                    id="reference__email"
                    class="form-control"
                    placeholder="Reference Email"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label" for="refphone_number"
                    >Reference Phone Number</label
                  >
                  <input
                    v-model="form.reference__phone_number"
                    type="text"
                    name="reference__phone_number"
                    id="reference__phone_number"
                    class="form-control"
                    placeholder="Reference Phone Number"
                  />
                </div>
              </div>
            </form>
            <!-- end of employee form  -->
            <div class="d-flex justify-content-between">
              <button class="btn btn-outline-secondary btn-prev" disabled>
                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
              </button>
              <button class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none">Next</span>
                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
              </button>
            </div>
          </div>
          <div id="personal-info" class="content">
            <div class="content-header">
              <h5 class="mb-0">Training Details</h5>
              <small>Set up Training Details</small>
            </div>
            <form>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="training_title">Training Title</label>
                  <input
                    v-model="form.training__training_title"
                    type="text"
                    name="training__training_title"
                    id="training__training_title"
                    class="form-control"
                    placeholder="Training Title"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="topics_covered">
                    Training Topics Covered
                  </label>
                  <input
                    v-model="form.training__topics_covered"
                    type="text"
                    name="training__topics_covered"
                    id="training__topics_covered"
                    class="form-control"
                    placeholder=" Topics Covered"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="institute"> Training Institute </label>
                  <input
                    v-model="form.training__institute"
                    type="text"
                    name="training__institute"
                    id="training__institute"
                    class="form-control"
                    placeholder="Training Institute"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="training_type"> Training Type </label>
                  <input
                    v-model="form.training__training_type"
                    type="text"
                    name="training_type"
                    id="training_type"
                    class="form-control"
                    placeholder="Training training Type"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="country"> Training Country </label>
                  <input
                    v-model="form.training__country"
                    type="text"
                    name="training__country"
                    id="training__country"
                    class="form-control"
                    placeholder="Training Country"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="location"> Training Location </label>
                  <input
                    v-model="form.training__location"
                    type="text"
                    name="training__location"
                    id="training__location"
                    class="form-control"
                    placeholder="Training Location"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="training_year"> Training Year </label>
                  <input
                    v-model="form.training__training_year"
                    type="text"
                    name="training__training_year"
                    id="training__training_year"
                    class="form-control"
                    placeholder="Training Year"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="duration"> Training duration </label>
                  <input
                    v-model="form.training__duration"
                    type="text"
                    name="training__duration"
                    class="form-control flatpickr-range flatpickr-input active"
                    placeholder="YYYY-MM-DD to YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
              </div>
            </form>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-prev">
                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
              </button>
              <button class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none">Next</span>
                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
              </button>
            </div>
          </div>
          <div id="address-step" class="content">
            <div class="content-header">
              <h5 class="mb-0">Experience Details</h5>
              <small>Set Up Experience Details</small>
            </div>
            <form>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="company_name">Company Name</label>
                  <input
                    v-model="form.experience__company_name"
                    type="text"
                    id="experience__company_name"
                    name="experience__company_name"
                    class="form-control"
                    placeholder="Enter Company Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="department">Department</label>
                  <select
                    v-model="form.experience__department"
                    id="experience__department"
                    name="experience__department"
                    class="form-control"
                  >
                    <option>Select Department</option>
                    <option>Web Development</option>
                    <option>App Development</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="position_held">Position Held</label>
                  <input
                    v-model="form.experience__position_held"
                    type="text"
                    id="experience__position_held"
                    name="experience__position_held"
                    class="form-control"
                    placeholder="Position Held"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="responsibility">Responsibility</label>
                  <textarea
                    v-model="form.experience__responsibility"
                    id="experience__responsibility"
                    name="experience__responsibility"
                    class="form-control"
                    placeholder="Responsibility"
                  >
                  </textarea>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="experience_area">Experience Area</label>
                  <textarea
                    v-model="form.experience__experience_area"
                    id="experience__experience_area"
                    name="experience__experience_area"
                    class="form-control"
                    placeholder="Experience Area"
                  ></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="from_date">From Date</label>
                  <input
                    v-model="form.experience__from_date"
                    type="text"
                    class="form-control flatpickr-basic flatpickr-input"
                    name="experience__from_date"
                    placeholder="YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="to_date">To Date</label>
                  <input
                    v-model="form.experience__to_date"
                    type="text"
                    class="form-control flatpickr-basic flatpickr-input"
                    name="experience__to_date"
                    placeholder="YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="company_address">Company Address</label>
                  <textarea
                    v-model="form.experience__company_address"
                    id="experience__company_address"
                    name="experience__company_address"
                    class="form-control"
                    placeholder="Company Address"
                  ></textarea>
                </div>
              </div>
            </form>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-prev">
                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
              </button>
              <button class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none">Next</span>
                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
              </button>
            </div>
          </div>
          <div id="social-links" class="content">
            <div class="content-header">
              <h5 class="mb-0">Promotion Details</h5>
              <small>Set Up Promotion Details.</small>
            </div>
            <form>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="promemployee_name">Employee Name</label>
                  <input
                    v-model="form.promotion__employee_number"
                    type="text"
                    id="promotion__employee_number"
                    name="promotion__employee_number"
                    class="form-control"
                    placeholder="Employee Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="fp-default">Promotoion Date</label>
                  <input
                    v-model="form.promotion__promotion_date"
                    type="text"
                    name="promotion__promotion_date"
                    class="form-control flatpickr-basic flatpickr-input"
                    placeholder="YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="previous_designation"
                    >Previous Designation</label
                  >
                  <input
                    v-model="form.promotion__previous_designation"
                    type="text"
                    id="previous_designation"
                    class="form-control"
                    name="previous_designation"
                    placeholder="Previous Designation"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="new_designation">New Designation</label>
                  <input
                    v-model="form.promotion__new_designation"
                    type="text"
                    id="new_designation"
                    class="form-control"
                    placeholder="New Designation"
                    name="new_designation"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="previous_grade">Previous Grade</label>
                  <input
                    v-model="form.promotion__previous_grade"
                    type="text"
                    id="previous_grade"
                    class="form-control"
                    name="previous_grade"
                    placeholder="Previous Grade"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="new_degree">New Degree</label>
                  <input
                    v-model="form.promotion__new_degree"
                    type="text"
                    id="new_degree"
                    name="new_degree"
                    class="form-control"
                    placeholder="New Degree"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="previous_promotion_date"
                    >Previous Promotion Date</label
                  >
                  <input
                    v-model="form.promotion__previous_promotion_date"
                    type="text"
                    class="form-control flatpickr-basic flatpickr-input"
                    name="previous_promotion_date"
                    placeholder="YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="previous_basic">Previous basic</label>
                  <input
                    v-model="form.promotion__previous_basic"
                    type="text"
                    id="previous_basic"
                    name="previous_basic"
                    class="form-control"
                    placeholder="Previous Previous salary"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="new_basic">New basic</label>
                  <input
                    v-model="form.promotion__new_basic"
                    type="text"
                    id="new_basic"
                    name="new_basic"
                    class="form-control"
                    placeholder="New salary"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="previous_gross">Previous Gross</label>
                  <input
                    v-model="form.promotion__previous_gross"
                    type="text"
                    id="previous_gross"
                    name="previous_gross"
                    class="form-control"
                    placeholder="Previous Gross"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="new_gross">New Gross</label>
                  <input
                    v-model="form.promotion__new_gross"
                    type="text"
                    id="new_gross"
                    name="new_gross"
                    class="form-control"
                    placeholder="new Gross"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="increment_amount"
                    >Increment Amount</label
                  >
                  <input
                    v-model="form.promotion__increment_amount"
                    type="text"
                    id="increment_amount"
                    name="increment_amount"
                    class="form-control"
                    placeholder="Increment Amount"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="effect_date">Effect Date</label>
                  <input
                    v-model="form.promotion__effect_date"
                    type="text"
                    id="effect_date"
                    class="form-control flatpickr-basic flatpickr-input"
                    name="effect_date"
                    placeholder="YYYY-MM-DD"
                    readonly="readonly"
                  />
                </div>
              </div>
            </form>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-prev">
                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
              </button>
              <button @click.prevent="AddEmployee" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Horizontal Wizard -->
  </div>
</template>

<script>
import Employee from "../../api/Employee.js";
import GetDepartment from "../../mixins/GetDepartment.js";

import Stepper from "bs-stepper";
import Form from './utilities/FormData';
import ResetForm from './utilities/ResetForm';
import Swal from 'sweetalert2'
import FormPickers from '../../core/form-pickers'
export default {
  data() {
    return {
      form: {
        employee_name: "",
        employee_status: "",
        employee_department: "",
        employee_designation: "",
        employee_type:"",
        basic_salary: "",
        gross_salary: "",
        tin: "",
        employee_image: "",
        mobile_number: "",
        emergency_mobile_number: "",
        email: "",
        joining_date: "",
        father_name: "",
        mother_name: "",
        nid: "",
        religion: "",
        blood_group: "",
        gender: "",
        bank_name: "",
        bank_account_number: "",
        weekly_off_day: "",
        permanent_address: "",
        present_address: "",
        education__eduction_level: "",
        education__major_group: "",
        education__institute: "",
        education__country: "",
        education__result_type: "",
        education__result: "",
        education__passing_year: "",
        education__duration: "",
        education__achievement: "",
        training__training_title: "",
        training__topics_covered: "",
        training__institute: "",
        training__training_type: "",
        training__country: "",
        training__location: "",
        training__training_year: "",
        training__duration: "",
        experience__company_name: "",
        experience__department: "",
        experience__position_held: "",
        experience__responsibility: "",
        experience__experience_area: "",
        experience__from_date: "",
        experience__to_date: "",
        experience__company_address: "",
        relative__name: "",
        relative__relation_type: "",
        relative__occupation: "",
        relative__gender: "",
        relative__address: "",
        relative__contact_number: "",
        reference__name: "",
        reference__organization: "",
        reference__relation: "",
        reference__address: "",
        reference__email: "",
        reference__phone_number: "",
        promotion__employee_number: "",
        promotion__promotion_date: "",
        promotion__previous_designation: "",
        promotion__new_designtion: "",
        promotion__previous_grade: "",
        promotion__new_degree: "",
        promotion__previous_promotion_date: "",
        promotion__previous_basic: "",
        promotion__new_basic: "",
        promotion__previous_gross: "",
        promotion__new_gross: "",
        promotion__increment_amount: "",
        promotion__effect_date: "",
        // promotion__refference_no:"",
        // promotion__approved:"",
      },
      errors:{}
    };
  },
  mixins: [GetDepartment],
  methods: {
    AddEmployeeImage(event) {
        this.form.employee_image = event.target.files[0];
        console.log(this.form.employee_image);
    },
    AddEmployee() {
      const formData = Form(this.form);
      Employee.addEmployee(formData)
        .then((response) => {
          console.log(response);
          ResetForm(this.form);
            Swal.fire(
                    'Success',
                    response.data.success,
                    'success'
            );
        })
        .catch((error) => {
            console.log(error.response);
            if(error?.response?.status === 422 ){
                this.errors = error.response.data.errors;
                console.log(this.errors);
            }
        });
    },

  },

  mounted() {
    FormPickers();
    this.getDepartment();
    /// for bs-stepper
    const BsStepper = document.querySelector(".bs-stepper");
    const horizontalWizard = document.querySelector(".horizontal-wizard-example");
    BsStepper.addEventListener("show.bs-stepper", function (event) {
      console.warn("show.bs-stepper", event);
      var index = event.detail.indexStep;
      var numberOfSteps = $(event.target).find(".step").length - 1;
      var line = $(event.target).find(".step");
      // The first for loop is for increasing the steps,
      // the second is for turning them off when going back
      for (var i = 0; i < index; i++) {
        line[i].classList.add("crossed");

        for (var j = index; j < numberOfSteps; j++) {
          line[j].classList.remove("crossed");
        }
      }
      if (event.detail.to == 0) {
        for (var k = index; k < numberOfSteps; k++) {
          line[k].classList.remove("crossed");
        }
        line[0].classList.remove("crossed");
      }
    });
    var numberedStepper = new Stepper(horizontalWizard);
    const $form = $(horizontalWizard).find("form");
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          employee_name: {
            required: true,
          },
          employee_department: {
            required: true,
          },
          employee_designation: {
            required: true,
          },
          basic_salary: {
            required: true,
          },
          gross_salary: {
            required: true,
          },
          tin: {
            required: true,
          },
          employee_image: {
            required: true,
          },
          mobile_number: {
            required: true,
          },
          emergency_mobile_number: {
            required: true,
          },
          email: {
            required: true,
          },
          joining_date: {
            required: true,
          },
          father_name: {
            required: true,
          },
          mother_name: {
            required: true,
          },
          nid: {
            required: true,
          },
          religion: {
            required: true,
          },
          blood_group: {
            required: true,
          },
          gender: {
            required: true,
          },
          bank_name: {
            required: true,
          },
          bank_account_number: {
            required: true,
          },
          weekly_off_day: {
            required: true,
          },
          permanent_address: {
            required: true,
          },
          present_address: {
            required: true,
          },
          education__eduction_level:{
              required:true
          },
          education__institute:{
              required:true
          },
          education__country:{
              required:true
          },
          education__result_type:{
              required:true
          },
          education__result:{
              required:true
          },
          education__passing_year:{
              required:true
          },
          education__duration:{
              required:true
          },
          education__achievement:{
              required:true
          },
          training__training_title:{
              required:true
          },
          training__topics_covered:{
              required:true
          },
          training__institute:{
              required:true
          },
          training__training_type:{
              required:true
          },
          training__country:{
              required:true
          },
          training__location:{
              required:true
          },
          training__training_year:{
              required:true
          },
          training__duration:{
              required:true
          },
          relative__name:{
              required:true
          },
          relative__relation_type:{
              required:true
          },
          relative__occupation:{
              required:true
          },
          relative__gender:{
              required:true
          },
          relative__address:{
              required:true
          },
          relative__contact_number:{
              required:true
          },
          reference__name:{
              required:true
          },
          reference__organization:{
              required:true,
          },
          reference__relation:{
              required:true,
          },
          reference__address:{
              required:true
          },
          reference__email:{
              required:true
          },
          reference__phone_number:{
              required:true
          },
        },
      });
    });

    $(horizontalWizard)
      .find(".btn-next")
      .each(function () {
        $(this).on("click", function (e) {
          var isValid = $(this).parent().siblings("form").valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(horizontalWizard)
      .find(".btn-prev")

      .find(".btn-submit")
      .on("click", function () {
        var isValid = $(this).parent().siblings("form").valid();
        // if (isValid) {
        //   alert('Submitted..!!');
        // }
      });
  },
};
</script>
