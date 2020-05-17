<!DOCTYPE html>
<html lang="en">

<head>

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php")?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php  include("layout/sidebar.php") ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="container">

                    <div class="row">



                        <div class="row">




                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Select Field</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">

                                        <div class="row">

                                            <div class="col-xl-4 mb-xl-0 mb-2">
                                                <select class="form-control form-control-lg">
                                                    <option>Large select</option>
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-xl-0 mb-2">
                                                <select class="form-control">
                                                    <option>Default select</option>
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-xl-0 mb-2">
                                                <select class="form-control form-control-sm">
                                                    <option>Small select</option>
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;!-- Large Input --&gt;
&lt;select class="form-control form-control-lg"&gt;
    &lt;option&gt;Large select&lt;/option&gt;
    &lt;option&gt;One&lt;/option&gt;
    &lt;option&gt;Two&lt;/option&gt;
    &lt;option&gt;Three&lt;/option&gt;
&lt;/select&gt;

&lt;!-- Default Input --&gt;
&lt;select class="form-control"&gt;
    &lt;option&gt;Default select&lt;/option&gt;
    &lt;option&gt;One&lt;/option&gt;
    &lt;option&gt;Two&lt;/option&gt;
    &lt;option&gt;Three&lt;/option&gt;
&lt;/select&gt;

&lt;!-- Small Input --&gt;
&lt;select class="form-control form-control-sm"&gt;
    &lt;option&gt;Small select&lt;/option&gt;
    &lt;option&gt;One&lt;/option&gt;
    &lt;option&gt;Two&lt;/option&gt;
    &lt;option&gt;Three&lt;/option&gt;
&lt;/select&gt;
</pre>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Horizontal form label sizing</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form>
                                            <div class="form-group row  mb-4">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control form-control-sm"
                                                        id="colFormLabelSm" placeholder="col-form-label-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="colFormLabel"
                                                        placeholder="col-form-label">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="colFormLabelLg"
                                                    class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="col-form-label-lg">
                                                </div>
                                            </div>
                                            <input type="submit" name="time" class="mb-4 btn btn-primary">
                                        </form>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;div class="form-group row  mb-4"&gt;
    &lt;label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"&gt;Email&lt;/label&gt;
    &lt;div class="col-sm-10"&gt;
        &lt;input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row mb-4"&gt;
    &lt;label for="colFormLabel" class="col-sm-2 col-form-label"&gt;Email&lt;/label&gt;
    &lt;div class="col-sm-10"&gt;
        &lt;input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row mb-4"&gt;
    &lt;label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"&gt;Email&lt;/label&gt;
    &lt;div class="col-sm-10"&gt;
        &lt;input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg"&gt;
    &lt;/div&gt;
&lt;/div&gt;
</pre>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="readonly_input" class="col-lg-12">
                                <div class="seperator-header">
                                    <h4 class="">Readonly</h4>
                                </div>
                            </div>

                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Input Readonly</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <input class="form-control" type="text" placeholder="Readonly input here…"
                                            readonly>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                                            <div class="code-section text-left">
                                                <pre>
&lt;input class="form-control" type="text" placeholder="Readonly input here…" readonly&gt;
</pre>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="html_custom_file_upload" class="col-lg-12">
                                <div class="seperator-header">
                                    <h4 class="">HTML Custom File Upload</h4>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>File Upload</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;div class="custom-file mb-4"&gt;
    &lt;input type="file" class="custom-file-input" id="customFile"&gt;
    &lt;label class="custom-file-label" for="customFile"&gt;Choose file&lt;/label&gt;
&lt;/div&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="disabled_form" class="col-lg-12">
                                <div class="seperator-header">
                                    <h4 class="">Disabled</h4>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Disabled Fields</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form>
                                            <fieldset disabled>
                                                <div class="form-group mb-4">
                                                    <label for="disabledTextInput">Disabled input</label>
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Disabled input">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="disabledSelect">Disabled select menu</label>
                                                    <select id="disabledSelect" class="form-control">
                                                        <option>Disabled select</option>
                                                    </select>
                                                </div>
                                                <div class="form-check mt-5 mb-3 pl-0">
                                                    <div class="custom-control custom-checkbox mb-4">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="disabledFieldsetCheck">
                                                        <label class="custom-control-label"
                                                            for="disabledFieldsetCheck">Can't check this</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-0">Submit</button>
                                            </fieldset>
                                        </form>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;form&gt;
    &lt;fieldset disabled&gt;
        &lt;div class="form-group mb-4"&gt;
            &lt;label for="disabledTextInput"&gt;Disabled input&lt;/label&gt;
            &lt;input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input"&gt;
        &lt;/div&gt;
        &lt;div class="form-group mb-4"&gt;
            &lt;label for="disabledSelect"&gt;Disabled select menu&lt;/label&gt;
            &lt;select id="disabledSelect" class="form-control"&gt;
                &lt;option&gt;Disabled select&lt;/option&gt;
            &lt;/select&gt;
        &lt;/div&gt;
        &lt;div class="form-check mt-5 mb-3 pl-0"&gt;
            &lt;div class="custom-control custom-checkbox mb-4"&gt;
                &lt;input type="checkbox" class="custom-control-input" id="disabledFieldsetCheck"&gt;
                &lt;label class="custom-control-label" for="disabledFieldsetCheck"&gt;Can't check this&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;button type="submit" class="btn btn-primary mt-0"&gt;Submit&lt;/button&gt;
    &lt;/fieldset&gt;
&lt;/form&gt;
</pre>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row layout-spacing">

                            <div id="custom_bs_forms" class="col-lg-12">
                                <div class="seperator-header">
                                    <h4 class="">Custom</h4>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Checkboxes</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check this custom
                                                checkbox</label>
                                        </div>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;div class="custom-control custom-checkbox"&gt;
    &lt;input type="checkbox" class="custom-control-input" id="customCheck1"&gt;
    &lt;label class="custom-control-label" for="customCheck1"&gt;Check this custom checkbox&lt;/label&gt;
&lt;/div&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Inline radio</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Toggle this
                                                custom
                                                radio</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Toggle this
                                                custom
                                                radio</label>
                                        </div>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
    &lt;div class="custom-control custom-radio custom-control-inline"&gt;
        &lt;input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input"&gt;
        &lt;label class="custom-control-label" for="customRadioInline1"&gt;Toggle this custom radio&lt;/label&gt;
        &lt;/div&gt;
    &lt;div class="custom-control custom-radio custom-control-inline"&gt;
        &lt;input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input"&gt;
        &lt;label class="custom-control-label" for="customRadioInline2"&gt;Toggle this custom radio&lt;/label&gt;
    &lt;/div&gt;
    </pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Radio</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">Toggle this custom
                                                radio</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="customRadio"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">Or toggle this other
                                                custom radio</label>
                                        </div>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;div class="custom-control custom-radio"&gt;
    &lt;input type="radio" id="customRadio1" name="customRadio" class="custom-control-input"&gt;
    &lt;label class="custom-control-label" for="customRadio1"&gt;Toggle this custom radio&lt;/label&gt;
&lt;/div&gt;
&lt;div class="custom-control custom-radio"&gt;
    &lt;input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"&gt;
    &lt;label class="custom-control-label" for="customRadio2"&gt;Or toggle this other custom radio&lt;/label&gt;
&lt;/div&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Disabled</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckDisabled"
                                                disabled>
                                            <label class="custom-control-label" for="customCheckDisabled">Check this
                                                custom
                                                checkbox</label>
                                        </div>

                                        <div class="custom-control custom-radio mb-4">
                                            <input type="radio" id="radio3" name="radioDisabled"
                                                class="custom-control-input" disabled>
                                            <label class="custom-control-label" for="radio3">Toggle this custom
                                                radio</label>
                                        </div>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                                            <div class="code-section text-left">
                                                <pre>
&lt;div class="custom-control custom-checkbox mb-3"&gt;
    &lt;input type="checkbox" class="custom-control-input" id="customCheckDisabled" disabled&gt;
    &lt;label class="custom-control-label" for="customCheckDisabled"&gt;Check this custom checkbox&lt;/label&gt;
&lt;/div&gt;

&lt;div class="custom-control custom-radio mb-4"&gt;
    &lt;input type="radio" id="radio3" name="radioDisabled" class="custom-control-input" disabled&gt;
    &lt;label class="custom-control-label" for="radio3"&gt;Toggle this custom radio&lt;/label&gt;
&lt;/div&gt;
</pre>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Select menu</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <select class="custom-select mb-4">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                                            <div class="code-section text-left">
                                                <pre>
&lt;select class="custom-select mb-4"&gt;
    &lt;option selected&gt;Open this select menu&lt;/option&gt;
    &lt;option value="1"&gt;One&lt;/option&gt;
    &lt;option value="2"&gt;Two&lt;/option&gt;
    &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Select menu sizing</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <select class="custom-select custom-select-lg">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <select class="custom-select custom-select-sm mt-4">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                                            <div class="code-section text-left">
                                                <pre>
&lt;select class="custom-select custom-select-lg"&gt;
  &lt;option selected&gt;Open this select menu&lt;/option&gt;
  &lt;option value="1"&gt;One&lt;/option&gt;
  &lt;option value="2"&gt;Two&lt;/option&gt;
  &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;

&lt;select class="custom-select custom-select-sm"&gt;
  &lt;option selected&gt;Open this select menu&lt;/option&gt;
  &lt;option value="1"&gt;One&lt;/option&gt;
  &lt;option value="2"&gt;Two&lt;/option&gt;
  &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Multi select</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <select class="custom-select" multiple>
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                                            <div class="code-section text-left">
                                                <pre>
&lt;select class="custom-select" multiple&gt;
    &lt;option selected&gt;Open this select menu&lt;/option&gt;
    &lt;option value="1"&gt;One&lt;/option&gt;
    &lt;option value="2"&gt;Two&lt;/option&gt;
    &lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Select size</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <select class="custom-select mb-4" size="4">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="3">Four</option>
                                            <option value="3">Five</option>
                                        </select>

                                        <div class="code-section-container">

                                            <button class="btn toggle-code-snippet"><span>Code</span></button>

                                            <div class="code-section text-left">
                                                <pre>
&lt;select class="custom-select mb-4" size="4"&gt;
    &lt;option selected&gt;Open this select menu&lt;/option&gt;
    &lt;option value="1"&gt;One&lt;/option&gt;
    &lt;option value="2"&gt;Two&lt;/option&gt;
    &lt;option value="3"&gt;Three&lt;/option&gt;
    &lt;option value="3"&gt;Four&lt;/option&gt;
    &lt;option value="3"&gt;Five&lt;/option&gt;
&lt;/select&gt;
</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->



        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/js/app.js"></script>

        <script>
        $(document).ready(function() {
            App.init();
        });
        </script>
        <script src="plugins/highlight/highlight.pack.js"></script>
        <script src="assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/scrollspyNav.js"></script>
</body>

</html>