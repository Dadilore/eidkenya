@extends('admin.includes.admin_layout')

@section('pagetitle', 'Create Application')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                    <!--begin::Nav-->
                    <div class="stepper-nav mb-5">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Account Type</h3>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Account Info</h3>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Business Info</h3>
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Billing Details</h3>
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Completed</h3>
                        </div>
                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto mw-600px w-100 pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold d-flex align-items-center text-gray-900">Choose Account Type 
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span></h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="fv-row">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                <i class="ki-outline ki-badge fs-3x me-5"></i>
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                                                    <span class="text-gray-900 fw-bold d-block fs-4 mb-2">Personal Account</span>
                                                    <span class="text-muted fw-semibold fs-6">If you need more info, please check it out</span>
                                                </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Option-->
                                            <input type="radio" class="btn-check" name="account_type" value="corporate" id="kt_create_account_form_account_type_corporate" />
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                                                <i class="ki-outline ki-briefcase fs-3x me-5"></i>
                                                <!--begin::Info-->
                                                <span class="d-block fw-semibold text-start">
                                                    <span class="text-gray-900 fw-bold d-block fs-4 mb-2">Corporate Account</span>
                                                    <span class="text-muted fw-semibold fs-6">Create corporate account to mane users</span>
                                                </span>
                                                <!--end::Info-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-gray-900">Account Info</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-3">Specify Team Size 
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Provide your team size to help us setup your billing">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span></label>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row mb-2" data-kt-buttons="true">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                <input type="radio" class="btn-check" name="account_team_size" value="1-1" />
                                                <span class="fw-bold fs-3">1-1</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                                <input type="radio" class="btn-check" name="account_team_size" checked="checked" value="2-10" />
                                                <span class="fw-bold fs-3">2-10</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                <input type="radio" class="btn-check" name="account_team_size" value="10-50" />
                                                <span class="fw-bold fs-3">10-50</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                <input type="radio" class="btn-check" name="account_team_size" value="50+" />
                                                <span class="fw-bold fs-3">50+</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Customers will see this shortened version of your statement descriptor</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">Team Account Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-0 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label mb-5">Select Account Plan 
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Monthly billing will be based on your account plan">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span></label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="mb-0">
                                        <!--begin:Option-->
                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                            <!--begin:Label-->
                                            <span class="d-flex align-items-center me-2">
                                                <!--begin::Icon-->
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-bank fs-1 text-gray-600"></i>
                                                    </span>
                                                </span>
                                                <!--end::Icon-->
                                                <!--begin::Description-->
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold text-gray-800 text-hover-primary fs-5">Company Account</span>
                                                    <span class="fs-6 fw-semibold text-muted">Use images to enhance your post flow</span>
                                                </span>
                                                <!--end:Description-->
                                            </span>
                                            <!--end:Label-->
                                            <!--begin:Input-->
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="account_plan" value="1" />
                                            </span>
                                            <!--end:Input-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin:Option-->
                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                            <!--begin:Label-->
                                            <span class="d-flex align-items-center me-2">
                                                <!--begin::Icon-->
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-chart fs-1 text-gray-600"></i>
                                                    </span>
                                                </span>
                                                <!--end::Icon-->
                                                <!--begin::Description-->
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold text-gray-800 text-hover-primary fs-5">Developer Account</span>
                                                    <span class="fs-6 fw-semibold text-muted">Use images to your post time</span>
                                                </span>
                                                <!--end:Description-->
                                            </span>
                                            <!--end:Label-->
                                            <!--begin:Input-->
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" checked="checked" name="account_plan" value="2" />
                                            </span>
                                            <!--end:Input-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin:Option-->
                                        <label class="d-flex flex-stack mb-0 cursor-pointer">
                                            <!--begin:Label-->
                                            <span class="d-flex align-items-center me-2">
                                                <!--begin::Icon-->
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-chart-pie-4 fs-1 text-gray-600"></i>
                                                    </span>
                                                </span>
                                                <!--end::Icon-->
                                                <!--begin::Description-->
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold text-gray-800 text-hover-primary fs-5">Testing Account</span>
                                                    <span class="fs-6 fw-semibold text-muted">Use images to enhance time travel rivers</span>
                                                </span>
                                                <!--end:Description-->
                                            </span>
                                            <!--end:Label-->
                                            <!--begin:Input-->
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="account_plan" value="3" />
                                            </span>
                                            <!--end:Input-->
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-gray-900">Business Details</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                    <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label required">Business Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="business_name" class="form-control form-control-lg form-control-solid" value="Keenthemes Inc." />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Shortened Descriptor</span>
                                        <span class="lh-1 ms-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="&lt;div class=&#039;p-4 rounded bg-light&#039;&gt; &lt;div class=&#039;d-flex flex-stack text-muted mb-4&#039;&gt; &lt;i class=&quot;ki-outline ki-bank fs-3 me-3&quot;&gt;&lt;/i&gt; &lt;div class=&#039;fw-bold&#039;&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;d-flex flex-stack fw-semibold text-gray-600&#039;&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;separator separator-dashed my-2&#039;&gt;&lt;/div&gt; &lt;div class=&#039;d-flex flex-stack text-gray-900 fw-bold mb-2&#039;&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;d-flex flex-stack text-muted mb-2&#039;&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;d-flex flex-stack text-muted&#039;&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="business_descriptor" class="form-control form-control-lg form-control-solid" value="KEENTHEMES" />
                                    <!--end::Input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Customers will see this shortened version of your statement descriptor</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label required">Corporation Type</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                        <option></option>
                                        <option value="1">S Corporation</option>
                                        <option value="1">C Corporation</option>
                                        <option value="2">Sole Proprietorship</option>
                                        <option value="3">Non-profit</option>
                                        <option value="4">Limited Liability</option>
                                        <option value="5">General Partnership</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--end::Label-->
                                    <label class="form-label">Business Description</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label required">Contact Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="business_email" class="form-control form-control-lg form-control-solid" value="corp@support.com" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-gray-900">Billing Details</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                    <a href="#" class="text-primary fw-bold">Help Page</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Name On Card</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                        <!--end::Input-->
                                        <!--begin::Card logos-->
                                        <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                            <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                            <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                            <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                        </div>
                                        <!--end::Card logos-->
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-10">
                                    <!--begin::Col-->
                                    <div class="col-md-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row fv-row">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                                    <option></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                                    <option></option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                    <option value="2033">2033</option>
                                                    <option value="2034">2034</option>
                                                </select>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">CVV</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                                <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                            <!--end::Input-->
                                            <!--begin::CVV icon-->
                                            <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                <i class="ki-outline ki-credit-cart fs-2hx"></i>
                                            </div>
                                            <!--end::CVV icon-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                        <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                        <span class="form-check-label fw-semibold text-muted">Save Card</span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-8 pb-lg-10">
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-gray-900">Your Are Done!</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-semibold fs-6">If you need more info, please 
                                    <a href="#" class="link-primary fw-bold">Sign In</a>.</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div class="mb-0">
                                    <!--begin::Text-->
                                    <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great & amazing audience.</div>
                                    <!--end::Text-->
                                    <!--begin::Alert-->
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                        <!--begin::Icon-->
                                        <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <!--begin::Content-->
                                            <div class="fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                                <div class="fs-6 text-gray-700">To start using great tools, please, 
                                                <a href="utilities/wizards/vertical.html" class="fw-bold">Create Team Platform</a></div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--end::Alert-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-15">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Back</button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                    <span class="indicator-label">Submit 
                                    <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
                                <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>

@endsection

@push('scripts')

<script src="{{ asset ('assets/admin/js/custom/utilities/modals/create-account.js') }}"></script>
@endpush