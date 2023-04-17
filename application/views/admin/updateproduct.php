<div class="container">
    <h1 class="text-center">Add Product</h1>
    <button  type="submit" form="form-product" data-bs-toggle="tooltip" title="" class="btn btn-primary" data-bs-original-title="Save" aria-label="Save"><i class="fas fa-save"></i></button>
    <br> <br>
    <!-- Nav tabs -->
    <form id="form-product" action="<?= base_url() . 'admin/upprodvalue' ?>" method="post" enctype="multipart/form-data" data-oc-toggle="ajax">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="general-tab" data-toggle="tab" data-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="data-tab" data-toggle="tab" data-target="#data" type="button" role="tab" aria-controls="data" aria-selected="false">Data</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="links-tab" data-toggle="tab" data-target="#links" type="button" role="tab" aria-controls="links" aria-selected="false">Links</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="attribute-tab" data-toggle="tab" data-target="#attribute" type="button" role="tab" aria-controls="attribute" aria-selected="false">Attribute</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="option-tab" data-toggle="tab" data-target="#option" type="button" role="tab" aria-controls="option" aria-selected="false">Option</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="discount-tab" data-toggle="tab" data-target="#discount" type="button" role="tab" aria-controls="discount" aria-selected="false">Discount</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="special-tab" data-toggle="tab" data-target="#special" type="button" role="tab" aria-controls="special" aria-selected="false">Special</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="image-tab" data-toggle="tab" data-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
            </li> -->
        </ul>
        <hr>
        <br>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                General
                <input type="hidden" name="product_description[1][id]" value="<?= $product['id'] ?>">
                <hr>
                <div class="row mb-3 required">
                    <label for="input-name-1" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="product_description[1][name]" placeholder="Product Name" id="input-name-1" class="form-control" value="<?= $product['productName'] ?>">
                        </div>
                        <div id="error-name-1" class="invalid-feedback"></div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3 required">
                    <label for="input-meta-title-1" class="col-sm-2 col-form-label">Product Description</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="product_description[1][product_description]" placeholder="Product Description" id="input-product-description-1" class="form-control" value="<?= $product['productDescription'] ?>">
                        </div>
                        <div id="error-product-description-1" class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="data" role="tabpanel" aria-labelledby="data-tab">
                Data
                <hr>
                <div class="row mb-3 required">
                    <label for="input-model-1" class="col-sm-2 col-form-label">Model</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="product_description[1][model]" placeholder="Product Model" id="input-model-1" class="form-control" value="<?= $product['productModel'] ?>">
                        </div>
                        <div id="error-model-1" class="invalid-feedback"></div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="input-sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="sku" placeholder="SKU" id="input-sku" class="form-control" value="<?= $product['SKU'] ?>">
                        </div>
                        <div class="form-text">Stock Keeping Unit</div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="input-upc" class="col-sm-2 col-form-label">UPC</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="upc" placeholder="UPC" id="input-upc" class="form-control" value="<?= $product['UPC'] ?>">
                        </div>
                        <div class="form-text">Universal Product Code</div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="input-location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="location" placeholder="Location" id="input-location" class="form-control" value="<?= $product['location'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <fieldset>
                    <legend>Price</legend>
                    <div class="row mb-3">
                        <label for="input-price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="price" placeholder="Price" id="input-price" class="form-control" value="<?= $product['price'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-tax-class" class="col-sm-2 col-form-label">Tax Class</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="tax_class_id" id="input-tax-class" class="form-select">
                                    <option value="0"> --- None --- </option>
                                    <option value="9" selected>Taxable Goods</option>
                                    <option value="10">Downloadable Products</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <hr>
                <fieldset>
                    <legend>Stock</legend>
                    <div class="row mb-3">
                        <label for="input-quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" name="quantity" value="<?= $product['quantity'] ?>" placeholder="Quantity" id="input-quantity" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-minimum" class="col-sm-2 col-form-label">Minimum Quantity</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="minimum" value="<?= $product['minimum'] ?>" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
                            </div>
                            <div class="form-text">Force a minimum ordered amount</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Subtract Stock</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div id="input-subtract" class="form-check form-switch form-switch-lg">
                                    <input type="checkbox" value="1" checked name="subtract" class="form-check-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-stock-status" class="col-sm-2 col-form-label">Out Of Stock Status</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="stock_status_id" id="input-stock-status" class="form-select">
                                    <option value="6">2-3 Days</option>
                                    <option value="7">In Stock</option>
                                    <option value="5">Out Of Stock</option>
                                    <option value="8">Pre-Order</option>
                                </select>
                            </div>
                            <div class="form-text">Status shown when a product is out of stock</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-date-available" class="col-sm-2 col-form-label">Date Available</label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group">
                                <input type="date" name="date_available" value="<?= $product['dateAvailable'] ?>" placeholder="Date Available" id="input-date-available" class="form-control date">
                                <div class="input-group-text"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <hr>
                <fieldset>
                    <legend>Specification</legend>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Requires Shipping</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div id="input-shipping" class="form-check form-switch form-switch-lg">
                                    <input type="checkbox" value="1" checked name="shipping" class="form-check-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-length" class="col-sm-2 col-form-label">Dimensions (L x W x H)</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="length" value="<?= $product['length'] ?>" placeholder="Length" id="input-length" class="form-control">

                                <input type="text" name="width" value="<?= $product['width'] ?>" placeholder="Width" id="input-width" class="form-control">

                                <input type="text" name="height" value="<?= $product['height'] ?>" placeholder="Height" id="input-height" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-length-class" class="col-sm-2 col-form-label">Length Class</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="length_class_id" id="input-length-class" class="form-select">
                                    <option value="1" selected="">Centimeter</option>
                                    <option value="2">Millimeter</option>
                                    <option value="3">Inch</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-weight" class="col-sm-2 col-form-label">Weight</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="weight" value="<?= $product['weight'] ?>" placeholder="Weight" id="input-weight" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-weight-class" class="col-sm-2 col-form-label">Weight Class</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="weight_class_id" id="input-weight-class" class="form-select">
                                    <option value="1" selected="">Kilogram</option>
                                    <option value="2">Gram</option>
                                    <option value="5">Pound </option>
                                    <option value="6">Ounce</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="status" id="input-status" class="form-select">
                                    <option value="1" selected="selected">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-sort-order" class="col-sm-2 col-form-label">Sort Order</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="sort_order" value="1" placeholder="Sort Order" id="input-sort-order" class="form-control">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="tab-pane" id="links" role="tabpanel" aria-labelledby="links-tab">
                Links
                <hr>
                <div id="tab-links" class="tab-pane active">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Manufacturer</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="manufacturer" value="<?= $product['manufacturer'] ?>" placeholder="Manufacturer" id="input-manufacturer" list="list-manufacturer" class="form-control">
                            </div>
                            <input type="hidden" name="manufacturer_id" value="0" id="input-manufacturer-id">
                            <datalist id="list-manufacturer"></datalist>
                            <div class="form-text">(Autocomplete)</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Categories</label>
                        <div class="col-sm-10">
                            <input type="text" name="category" value="<?= $product['category'] ?>" placeholder="Categories" id="input-category" list="list-category" class="form-control">
                            <datalist id="list-category">
                            <?php
                        foreach ($category as $cat) :
                        ?>
                            <option><?= $cat['category'] ?></option>
                        <?php
                        endforeach;
                        ?>
                            </datalist>
                            <div class="input-group">
                                <div class="form-control p-0" style="height: 150px; overflow: auto;">
                                    <table id="product-category" class="table table-sm m-0">
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-text">(Autocomplete)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="attribute" role="tabpanel" aria-labelledby="attribute-tab">
                Attribute
                <hr>
            </div>
            <div class="tab-pane" id="option" role="tabpanel" aria-labelledby="option-tab">Option</div>
            <div class="tab-pane" id="discount" role="tabpanel" aria-labelledby="discount-tab">
                Discount
                <hr>
                <div id="tab-discount" class="tab-pane active">
                    <div class="table-responsive">
                        <table id="product-discount" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-start">Customer Group</td>
                                    <td class="text-end">Quantity</td>
                                    <td class="text-end">Priority</td>
                                    <td class="text-end">Price</td>
                                    <td class="text-start">Date Start</td>
                                    <td class="text-start">Date End</td>
                                    <td class="text-end"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($discount as $dist) :
                                ?>
                                    <tr id="discount-row-<?= $dist['id'] ?>" class="<?= $dist['id'] ?>">
                                        <td class="text-start"><select name="product_discount[discount-row-<?= $dist['id'] ?>][customer_group_id]" class="form-select">
                                                <option value="1">Default</option>
                                            </select><input type="hidden" name="product_discount[discount-row-<?= $dist['id'] ?>][product_discount_id]" value="<?= $dist['id'] ?>" /> <input type="hidden" name="product_discount[discount-row-<?= $dist['id'] ?>][product_id]" value="<?= $dist['productid'] ?>" /></td>

                                        <td class="text-end"><input type="text" name="product_discount[discount-row-<?= $dist['id'] ?>][quantity]" value="<?= $dist['quantity'] ?>" placeholder="Quantity" class="form-control" /></td>

                                        <td class="text-end"><input type="text" name="product_discount[discount-row-<?= $dist['id'] ?>][priority]" value="<?= $dist['priority'] ?>" placeholder="Priority" class="form-control" /></td>

                                        <td class="text-end"><input type="text" name="product_discount[discount-row-<?= $dist['id'] ?>][price]" value="<?= $dist['price'] ?>" placeholder="Price" class="form-control" /></td>

                                        <td class="text-start">
                                            <div class="input-group"><input type="date" name="product_discount[discount-row-<?= $dist['id'] ?>][date_start]" value="<?= $dist['date_start'] ?>" placeholder="Date Start" class="form-control date" />
                                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                            </div>
                                        </td>

                                        <td class="text-start">
                                            <div class="input-group"><input type="date" name="product_discount[discount-row-<?= $dist['id'] ?>][date_end]" value="<?= $dist['date_end'] ?>" placeholder="Date End" class="form-control date" />
                                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                            </div>
                                        </td>

                                        <td id="delete_discount" class="text-end"><button type="button" onclick="$('#discount-row-<?= $dist['id'] ?>' ).remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td class="text-end"><button type="button" id="button-discount" data-bs-toggle="tooltip" title="" class="btn btn-primary" data-bs-original-title="Add Discount" aria-label="Add Discount"><i class="fas fa-plus-circle"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="special" role="tabpanel" aria-labelledby="special-tab">
                Special
                <hr>
                <div id="tab-special" class="tab-pane">
                    <div class="table-responsive">
                        <table id="product-special" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-start">Customer Group</td>
                                    <td class="text-end">Priority</td>
                                    <td class="text-end">Price</td>
                                    <td class="text-start">Date Start</td>
                                    <td class="text-start">Date End</td>
                                    <td class="text-center"></td>
                                </tr>
                                <tbody>
                                <?php
                                // echo "Today is " . date("Y-m-d") . "<br>";
                                 foreach ($special as $sp) :
                                ?>
                                    <tr id="special-row-<?= $sp['id'] ?>" class="<?= $sp['id'] ?>">
                                        <td class="text-start"><select name="product_special[special-row-<?= $sp['id'] ?>][customer_group_id]" class="form-select">
                                                <option value="1">Default</option>
                                            </select><input type="hidden" name="product_special[special-row-<?= $sp['id'] ?>][product_special_id]" value="<?= $sp['id'] ?>" /><input type="hidden" name="product_special[special-row-<?= $sp['id'] ?>][product_id]" value="<?= $sp['productid'] ?>" /></td>

                                        <td class="text-end"><input type="text" name="product_special[special-row-<?= $sp['id'] ?>][priority]" value="<?= $sp['priority'] ?>" placeholder="Priority" class="form-control" /></td>

                                        <td class="text-end"><input type="text" name="product_special[special-row-<?= $sp['id'] ?>][price]" value="<?= $sp['price'] ?>" placeholder="Price" class="form-control" /></td>

                                        <td class="text-start">
                                            <div class="input-group"><input type="date" name="product_special[special-row-<?= $sp['id'] ?>][date_start]" value="<?= $sp['date_start'] ?>" placeholder="Date Start" class="form-control date" />
                                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                            </div>
                                        </td>

                                        <td class="text-start">
                                            <div class="input-group"><input type="date" name="product_special[special-row-<?= $sp['id'] ?>][date_end]" value="<?= $sp['date_end'] ?>" placeholder="Date End" class="form-control date" />
                                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                            </div>
                                        </td>

                                        <td id="delete_special" class="text-end"><button type="button" onclick="$('#special-row-<?= $sp['id'] ?>' ).remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="text-end"><button type="button" id="button-special" data-bs-toggle="tooltip" title="" class="btn btn-primary" data-bs-original-title="Add Special" aria-label="Add Special"><i class="fas fa-plus-circle"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="image" role="tabpanel" aria-labelledby="image-tab">
                Image
                <hr>
                <div id="tab-image" class="tab-pane">
                    <fieldset>
                        <legend>Image</legend>
                        <div class="row">
                            <div class="col-sm-4 col-md-3 mb-3">
                                <div id="image" class="card image">
                                    <img src="https://demo.opencart.com/image/cache/no_image-100x100.png" alt="" title="" id="thumb-image" data-oc-placeholder="https://demo.opencart.com/image/cache/no_image-100x100.png" class="card-img-top"> <input type="hidden" name="image" value="" id="input-image">
                                    <div class="card-body">
                                        <input type="file" id="myfile" name="myfile">
                                        <!-- <button type="button" data-oc-toggle="image" data-oc-target="#input-image" data-oc-thumb="#thumb-image" class="btn btn-primary btn-sm btn-block"><i class="fas fa-pencil-alt"></i> Edit</button> -->
                                        <button type="button" data-oc-toggle="clear" data-oc-target="#input-image" data-oc-thumb="#thumb-image" class="btn btn-warning btn-sm btn-block"><i class="fas fa-trash-alt"></i> Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Additional Images</legend>
                        <div class="table-responsive">
                            <table id="product-image" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-start">Image</td>
                                        <td class="text-start">Sort Order</td>
                                        <td class="text-end"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-end"><button type="button" id="button-image" data-bs-toggle="tooltip" title="" class="btn btn-primary" data-bs-original-title="Add Image" aria-label="Add Image"><i class="fas fa-plus-circle"></i></button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </form>

</div>

<script>
    $(document).ready(function() {


        var discount_row = 0;

        $('#button-discount').on('click', function() {
            html = '<tr id="discount-row-' + discount_row + '">';
            html += '  <td class="text-start"><select name="product_discount_add[' + discount_row + '][customer_group_id]" class="form-select">';
            html += '    <option value="1">Default</option>';
            html += '  </select><input type="hidden" name="product_discount_add[' + discount_row + '][product_discount_id]" value=""/></td>';
            html += '  <td class="text-end"><input type="text" name="product_discount_add[' + discount_row + '][quantity]" value="" placeholder="Quantity" class="form-control"/></td>';
            html += '  <td class="text-end"><input type="text" name="product_discount_add[' + discount_row + '][priority]" value="" placeholder="Priority" class="form-control"/></td>';
            html += '  <td class="text-end"><input type="text" name="product_discount_add[' + discount_row + '][price]" value="" placeholder="Price" class="form-control"/></td>';
            html += '  <td class="text-start"><div class="input-group"><input type="date" name="product_discount_add[' + discount_row + '][date_start]" value="" placeholder="Date Start" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
            html += '  <td class="text-start"><div class="input-group"><input type="date" name="product_discount_add[' + discount_row + '][date_end]" value="" placeholder="Date End" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
            html += '  <td class="text-end"><button type="button" onclick="$(\'#discount-row-' + discount_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-discount tbody').append(html);

            discount_row++;
        });
        var special_row = 0;

        $('#button-special').on('click', function() {
            html = '<tr id="special-row-' + special_row + '">';
            html += '  <td class="text-start"><select name="product_special_add[' + special_row + '][customer_group_id]" class="form-select">';
            html += '      <option value="1">Default</option>';
            html += '  </select><input type="hidden" name="product_special_add[' + special_row + '][product_special_id]" value=""/></td>';
            html += '  <td class="text-end"><input type="text" name="product_special_add[' + special_row + '][priority]" value="" placeholder="Priority" class="form-control"/></td>';
            html += '  <td class="text-end"><input type="text" name="product_special_add[' + special_row + '][price]" value="" placeholder="Price" class="form-control"/></td>';
            html += '  <td class="text-start"><div class="input-group"><input type="date" name="product_special_add[' + special_row + '][date_start]" value="" placeholder="Date Start" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
            html += '  <td class="text-start"><div class="input-group"><input type="date" name="product_special_add[' + special_row + '][date_end]" value="" placeholder="Date End" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
            html += '  <td class="text-end"><button type="button" onclick="$(\'#special-row-' + special_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-special tbody').append(html);

            special_row++;
        });

        var image_row = 0;

        $('#button-image').on('click', function() {
            html = '<tr id="product-image-row-' + image_row + '">';
            html += '  <td><div class="card image">';
            html += '    <img src="https://demo.opencart.com/image/cache/no_image-100x100.png" alt="" title="" id="thumb-image-' + image_row + '" data-oc-placeholder="https://demo.opencart.com/image/cache/no_image-100x100.png" class="card-img-top"/> <input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-product-image-' + image_row + '"/>';
            html += '    <div class="card-body">';
            html += '      <input type="file" id="product_image[' + image_row + '][addfile]" name="product_image[' + image_row + '][addfile]">';
            html += '      <button type="button" data-oc-toggle="clear" data-oc-target="#input-product-image-' + image_row + '" data-oc-thumb="#thumb-image-' + image_row + '" class="btn btn-warning btn-sm btn-block"><i class="fas fa-trash-alt"></i> Clear</button>';
            html += '    </div>';
            html += '  </div></td>';
            html += '  <td class="text-start"><input type="text" name="product_image[' + image_row + '][sort_order]" value="0" placeholder="Sort Order" class="form-control"/></td>';
            html += '  <td class="text-end"><button type="button" onclick="$(\'#product-image-row-' + image_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-image tbody').append(html);

            image_row++;
        });

        $(document).on('click', '#delete_discount', function(e) {
            e.preventDefault();
            // var id = $(this).find("input[name='id']").val();
            var id = $(this).parents("tr").attr("class");
            alert(id);
            // var category = $(this).find("input[name='catname']").val();

            // console.log(id+category);
            // $.ajax({
            //     method: "POST",
            //     url: "<?= base_url() . 'admin/updatecategory' ?>",
            //     data: {
            //         id: id,
            //         category: category
            //     },
            //     success: function(data) {
            //         // $('#wrap').load('#wrap');
            //         $('#msg').html(data);
            //         $("#close").click();
            //         $("#wrap").load(location.href + " #wrap");
            //         // alert(id+category)

            //     }
            // });
        });
        $(document).on('click', '#delete_special', function(e) {
            e.preventDefault();
            // var id = $(this).find("input[name='id']").val();
            var id = $(this).parents("tr").attr("class");
            // alert(id);
            // var category = $(this).find("input[name='catname']").val();

            // console.log(id+category);
            $.ajax({
                method: "POST",
                url: "<?= base_url() . 'admin/deletespecial' ?>",
                data: {
                    id: id,
                    // category: category
                },
                success: function(data) {
                    // $('#wrap').load('#wrap');
                    // $('#msg').html(data);
                    // $("#close").click();
                    // $("#wrap").load(location.href + " #wrap");
                    alert('Row delated')

                }
            });
        });


    });
</script>

<!-- <script type="text/javascript">
    $('textarea[data-oc-toggle=\'ckeditor\']').ckeditor();

    // Manufacturer
    $('#input-manufacturer').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/manufacturer|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    json.unshift({
                        manufacturer_id: 0,
                        name: ' --- None --- '
                    });

                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['manufacturer_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            //$('#input-manufacturer').val(item['label']);
            $('#input-manufacturer-id').val(item['value']);
        }
    });

    // Category
    $('#input-category').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/category|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['category_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('#input-category').val('');

            $('#product-category-' + item['value']).remove();

            html = '<tr id="product-category-' + item['value'] + '">';
            html += '  <td>' + item['label'] + '<input type="hidden" name="product_category[]" value="' + item['value'] + '"/></td>';
            html += '  <td class="text-end"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-category tbody').append(html);
        }
    });

    $('#product-category').on('click', '.btn', function() {
        $(this).parent().parent().remove();
    });

    // Filter
    $('#input-filter').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/filter|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['filter_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('#input-filter').val('');

            $('#product-filter-' + item['value']).remove();

            html = '<tr id="product-filter-' + item['value'] + '">';
            html += '  <td>' + item['label'] + '<input type="hidden" name="product_filter[]" value="' + item['value'] + '"/></td>';
            html += '  <td class="text-end"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-filter tbody').append(html);
        }
    });

    $('#product-filter').on('click', '.btn', function() {
        $(this).parent().parent().remove();
    });

    // Downloads
    $('#input-download').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/download|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['download_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('#input-download').val('');

            $('#product-download-' + item['value']).remove();

            html = '<tr id="product-download-' + item['value'] + '">';
            html += '  <td>' + item['label'] + '<input type="hidden" name="product_download[]" value="' + item['value'] + '"/></td>';
            html += '  <td class="text-end"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-download tbody').append(html);
        }
    });

    $('#product-download').on('click', '.btn', function() {
        $(this).parent().parent().remove();
    });

    // Related
    $('#input-related').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/product|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['product_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('#input-related').val('');

            $('#product-related-' + item['value']).remove();

            html = '<tr id="product-related-' + item['value'] + '">';
            html += '  <td>' + item['label'] + '<input type="hidden" name="product_related[]" value="' + item['value'] + '"/></td>';
            html += '  <td class="text-end"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#product-related tbody').append(html);
        }
    });

    $('#product-related').on('click', '.btn', function() {
        $(this).parent().parent().remove();
    });


    var attributeautocomplete = function(attribute_row) {
        $('input[name=\'product_attribute[' + attribute_row + '][name]\']').autocomplete({
            'source': function(request, response) {
                $.ajax({
                    url: 'index.php?route=catalog/attribute|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                    dataType: 'json',
                    success: function(json) {
                        response($.map(json, function(item) {
                            return {
                                category: item.attribute_group,
                                label: item.name,
                                value: item.attribute_id
                            }
                        }));
                    }
                });
            },
            'select': function(item) {
                $('input[name=\'product_attribute[' + attribute_row + '][attribute_id]\']').val(item['value']);
            }
        });
    }

    var attribute_row = 0;

    $('#product-attribute tr').each(function(index) {
        attributeautocomplete(index);
    });

    $('#button-attribute').on('click', function() {
        html = '<tr id="attribute-row-' + attribute_row + '">';
        html += '  <td class="text-start">';
        html += '    <input type="text" name="product_attribute[' + attribute_row + '][name]" value="" placeholder="Attribute" id="input-attribute-' + attribute_row + '" list="list-attribute-0" class="form-control"/>';
        html += '    <input type="hidden" name="product_attribute[' + attribute_row + '][attribute_id]" value="" id="input-attribute-id-' + attribute_row + '"/>';
        html += '    <datalist id="list-attribute-0"></datalist>';
        html += '  </td>';
        html += '  <td class="text-start">';
        html += '<div class="input-group">';
        html += '  <div class="input-group-text"><img src="language/en-gb/en-gb.png" title="English" /></div>';
        html += '  <textarea name="product_attribute[' + attribute_row + '][product_attribute_description][1][text]" rows="5" placeholder="Text" id="input-text-' + attribute_row + '-1" class="form-control"></textarea>';
        html += '</div>';
        html += '  </td>';
        html += '  <td class="text-end"><button type="button" onclick="$(\'#attribute-row-' + attribute_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#product-attribute').append(html);

        attributeautocomplete(attribute_row);

        attribute_row++;
    });

    var option_row = 0;

    $('#input-option').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/option|autocomplete&user_token=fedec9e7fe631519a622c5c6a1771ceb&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            category: item['category'],
                            label: item['name'],
                            value: item['option_id'],
                            type: item['type'],
                            option_value: item['option_value']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            html = '<fieldset id="option-row-' + option_row + '">';
            html += '  <legend>' + item['label'] + ' <button type="button" class="btn btn-danger btn-sm float-end" onclick="$(\'#option-row-' + option_row + '\').remove();"><i class="fas fa-minus-circle"></i></button></legend>';
            html += '  <input type="hidden" name="product_option[' + option_row + '][product_option_id]" value="" />';
            html += '  <input type="hidden" name="product_option[' + option_row + '][name]" value="' + item['label'] + '" />';
            html += '  <input type="hidden" name="product_option[' + option_row + '][option_id]" value="' + item['value'] + '" />';
            html += '  <input type="hidden" name="product_option[' + option_row + '][type]" value="' + item['type'] + '" />';

            html += '  <div class="row mb-3">';
            html += '    <label for="input-required-' + option_row + '" class="col-sm-2 col-form-label">Required</label>';
            html += '	   <div class="col-sm-10"><select name="product_option[' + option_row + '][required]" id="input-required-' + option_row + '" class="form-select">';
            html += '	     <option value="1">Yes</option>';
            html += '	     <option value="0">No</option>';
            html += '	 </select></div>';
            html += '  </div>';

            if (item['type'] == 'text') {
                html += '	<div class="row mb-3">';
                html += '	  <label for="input-option-' + option_row + '" class="col-sm-2 col-form-label">Option Value</label>';
                html += '	  <div class="col-sm-10"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-option-' + option_row + '" class="form-control"/></div>';
                html += '	</div>';
            }

            if (item['type'] == 'textarea') {
                html += '	<div class="row mb-3">';
                html += '	  <label for="input-option-' + option_row + '" class="col-sm-2 col-form-label">Option Value</label>';
                html += '	  <div class="col-sm-10"><textarea name="product_option[' + option_row + '][value]" rows="5" placeholder="Option Value" id="input-option-' + option_row + '" class="form-control"></textarea></div>';
                html += '	</div>';
            }

            if (item['type'] == 'file') {
                html += '	<div class="row mb-3 d-none">';
                html += '	  <label for="input-option-' + option_row + '" class="col-sm-2 col-form-label">Option Value</label>';
                html += '	  <div class="col-sm-10 d-none"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-option-' + option_row + '" class="form-control"/></div>';
                html += '	</div>';
            }

            if (item['type'] == 'date') {
                html += '	<div class="row mb-3">';
                html += '	  <label for="input-option-' + option_row + '" class="col-sm-2 col-form-label">Option Value</label>';
                html += '	  <div class="col-sm-10 col-md-4"><div class="input-group"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-option-' + option_row + '" class="form-control date"/><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div>';
                html += '	</div>';
            }

            if (item['type'] == 'time') {
                html += '	<div class="row mb-3">';
                html += '	  <label for="input-option-' + option_row + '" class="col-sm-2 col-form-label">Option Value</label>';
                html += '	  <div class="col-sm-10 col-md-4"><div class="input-group"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-option-' + option_row + '" class="form-control time"/><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div>';
                html += '	</div>';
            }

            if (item['type'] == 'datetime') {
                html += '	<div class="row mb-3">';
                html += '	  <label for="input-option-' + option_row + '" class="col-sm-2 col-form-label">Option Value</label>';
                html += '	  <div class="col-sm-10 col-md-4"><div class="input-group"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-option-' + option_row + '" class="form-control datetime"/><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div>';
                html += '	</div>';
            }

            if (item['type'] == 'select' || item['type'] == 'radio' || item['type'] == 'checkbox' || item['type'] == 'image') {
                html += '<div class="table-responsive">';
                html += '  <table id="option-value-' + option_row + '" class="table table-bordered table-hover">';
                html += '  	 <thead>';
                html += '      <tr>';
                html += '        <td class="text-start">Option Value</td>';
                html += '        <td class="text-end">Quantity</td>';
                html += '        <td class="text-start">Subtract Stock</td>';
                html += '        <td class="text-end">Price</td>';
                html += '        <td class="text-end">Points</td>';
                html += '        <td class="text-end">Weight</td>';
                html += '        <td></td>';
                html += '      </tr>';
                html += '    </thead>';
                html += '    <tbody></tbody>';
                html += '    <tfoot>';
                html += '      <tr>';
                html += '        <td colspan="6"></td>';
                html += '        <td class="text-end"><button type="button" data-option-row="' + option_row + '" data-bs-toggle="tooltip" title="Add Option Value" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>';
                html += '      </tr>';
                html += '    </tfoot>';
                html += '  </table>';
                html += '</div>';

                html += '  <select id="product-option-values-' + option_row + '" class="d-none">';

                for (i = 0; i < item['option_value'].length; i++) {
                    html += '<option value="' + item['option_value'][i]['option_value_id'] + '">' + item['option_value'][i]['name'] + '</option>';
                }

                html += '  </select>';
                html += '</fieldset>';
            }

            $('#option').append(html);

            option_row++;
        }
    });

    var option_value_row = 0;

    $('#option').on('click', '.btn-primary', function() {
        var element = this;

        if ($(element).attr('data-option-value-row')) {
            element.option_value_row = $(element).attr('data-option-value-row');
        } else {
            element.option_value_row = option_value_row;
        }

        $('.modal').remove();

        html = '<div id="modal-option" class="modal fade">';
        html += '  <div class="modal-dialog">';
        html += '    <div class="modal-content">';
        html += '      <div class="modal-header">';
        html += '        <h5 class="modal-title"><i class="fas fa-pencil-alt"></i> Option Value</h5> <button type="button" class="btn-close" data-bs-dismiss="modal"></button>';
        html += '      </div>';
        html += '      <div class="modal-body">';
        html += '        <div class="mb-3">';
        html += '      	   <label for="input-modal-option-value" class="form-label">Option Value</label>';
        html += '      	   <select name="option_value_id" id="input-modal-option-value" class="form-select">';

        option_value = $('#product-option-values-' + $(element).attr('data-option-row') + ' option');

        for (i = 0; i < option_value.length; i++) {
            if ($(element).attr('data-option-value-row') && $(option_value[i]).val() == $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][option_value_id]\']').val()) {
                html += '<option value="' + $(option_value[i]).val() + '" selected="selected">' + $(option_value[i]).text() + '</option>';
            } else {
                html += '<option value="' + $(option_value[i]).val() + '">' + $(option_value[i]).text() + '</option>';
            }
        }

        html += '      	   </select>';
        html += '          <input type="hidden" name="product_option_value_id" value="' + ($(element).attr('data-option-value-row') ? $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][product_option_value_id]\']').val() : '') + '"/>';
        html += '        </div>';

        html += '        <div class="mb-3">';
        html += '          <input type="hidden" name="product_option_value_id" value="' + ($(element).attr('data-option-value-row') ? $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][product_option_value_id]\']').val() : '') + '"/>';


        html += '      	   <label for="input-modal-quantity" class="form-label">Quantity</label>';
        html += '      	   <input type="text" name="quantity" value="' + ($(element).attr('data-option-value-row') ? $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][quantity]\']').val() : '1') + '" placeholder="Quantity" id="input-modal-quantity" class="form-control"/>';
        html += '        </div>';

        html += '        <div class="mb-3">';
        html += '      	   <label for="input-modal-subtract" class="form-label">Subtract Stock</label>';
        html += '      	   <select name="subtract" id="input-modal-subtract" class="form-select">';

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][subtract]\']').val() == '1') {
            html += '        <option value="1" selected="selected">Yes</option>';
            html += '      	 <option value="0">No</option>';
        } else {
            html += '      	 <option value="1">Yes</option>';
            html += '      	 <option value="0" selected="selected">No</option>';
        }

        html += '      	   </select>';
        html += '        </div>';

        html += '        <div class="mb-3">';
        html += '      	   <label for="input-modal-price" class="form-label">Price</label>';
        html += '          <div class="input-group">';
        html += '            <select name="price_prefix" class="form-select">';

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][price_prefix]\']').val() == '+') {
            html += '      	   <option value="+" selected="selected">+</option>';
        } else {
            html += '      	   <option value="+">+</option>';
        }

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][price_prefix]\']').val() == '-') {
            html += '      	       <option value="-" selected="selected">-</option>';
        } else {
            html += '      	       <option value="-">-</option>';
        }

        html += '      	     </select>';
        html += '      	     <input type="text" name="price" value="' + ($(element).attr('data-option-value-row') ? $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][price]\']').val() : '0') + '" placeholder="Price" id="input-modal-price" class="form-control"/>';
        html += '          </div>';
        html += '        </div>';

        html += '        <div class="mb-3">';
        html += '      	   <label for="input-modal-points" class="form-label">Points</label>';
        html += '          <div class="input-group">';
        html += '      	     <select name="points_prefix" class="form-select">';

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][points_prefix]\']').val() == '+') {
            html += '      	       <option value="+" selected>+</option>';
        } else {
            html += '      	       <option value="+">+</option>';
        }

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][points_prefix]\']').val() == '-') {
            html += '      	       <option value="-" selected>-</option>';
        } else {
            html += '      	       <option value="-">-</option>';
        }

        html += '      	     </select>';
        html += '      	     <input type="text" name="points" value="' + ($(element).attr('data-option-value-row') ? $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][points]\']').val() : '0') + '" placeholder="Points" id="input-modal-points" class="form-control"/>';
        html += '          </div>';
        html += '        </div>';

        html += '        <div class="mb-3">';
        html += '      	   <label for="input-modal-weight" class="form-label">Weight</label>';
        html += '          <div class="input-group">';
        html += '      	     <select name="weight_prefix" class="form-select">';

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][weight_prefix]\']').val() == '+') {
            html += '      	       <option value="+" selected>+</option>';
        } else {
            html += '      	       <option value="+">+</option>';
        }

        if ($(element).attr('data-option-value-row') && $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][weight_prefix]\']').val() == '-') {
            html += '      	       <option value="-" selected>-</option>';
        } else {
            html += '      	       <option value="-">-</option>';
        }

        html += '      	     </select>';
        html += '      	     <input type="text" name="weight" value="' + ($(element).attr('data-option-value-row') ? $('input[name=\'product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][weight]\']').val() : '0') + '" placeholder="Weight" id="input-modal-weight" class="form-control"/>';
        html += '          </div>';
        html += '        </div>';

        html += '      </div>';

        html += '      <div class="modal-footer">';
        html += '	     <button type="button" id="button-save" data-option-row="' + $(element).attr('data-option-row') + '" data-option-value-row="' + element.option_value_row + '" class="btn btn-primary">Save</button> <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>';
        html += '      </div>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        $('body').append(html);

        $('#modal-option').modal('show');

        $('#modal-option #button-save').on('click', function() {
            html = '<tr id="option-value-row-' + element.option_value_row + '">';
            html += '  <td class="text-start">' + $('#modal-option select[name=\'option_value_id\'] option:selected').text() + '<input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][option_value_id]" value="' + $('#modal-option select[name=\'option_value_id\']').val() + '"/><input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][product_option_value_id]" value="' + $('#modal-option input[name=\'product_option_value_id\']').val() + '"/></td>';
            html += '  <td class="text-end">' + $('#modal-option input[name=\'quantity\']').val() + '<input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][quantity]" value="' + $('#modal-option input[name=\'quantity\']').val() + '"/></td>';
            html += '  <td class="text-start">' + ($('#modal-option select[name=\'subtract\'] option:selected').val() == '1' ? 'Yes' : 'No') + '<input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][subtract]" value="' + $('#modal-option select[name=\'subtract\'] option:selected').val() + '"/></td>';
            html += '  <td class="text-end">' + $('#modal-option select[name=\'price_prefix\'] option:selected').val() + $('#modal-option input[name=\'price\']').val() + '<input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][price_prefix]" value="' + $('#modal-option select[name=\'price_prefix\'] option:selected').val() + '"/><input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][price]" value="' + $('#modal-option input[name=\'price\']').val() + '"/></td>';
            html += '  <td class="text-end"> ' + $('#modal-option select[name=\'points_prefix\'] option:selected').val() + $('#modal-option input[name=\'points\']').val() + '<input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][points_prefix]" value="' + $('#modal-option select[name=\'points_prefix\'] option:selected').val() + '"/><input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][points]" value="' + $('#modal-option input[name=\'points\']').val() + '"/></td>';
            html += '  <td class="text-end">' + $('#modal-option select[name=\'weight_prefix\'] option:selected').val() + $('#modal-option input[name=\'weight\']').val() + '<input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][weight_prefix]" value="' + $('#modal-option select[name=\'weight_prefix\'] option:selected').val() + '"/><input type="hidden" name="product_option[' + $(element).attr('data-option-row') + '][product_option_value][' + element.option_value_row + '][weight]" value="' + $('#modal-option input[name=\'weight\']').val() + '"/></td>';
            html += '  <td class="text-end"><button type="button" data-bs-toggle="tooltip" title="Edit" data-option-row="' + $(element).attr('data-option-row') + '" data-option-value-row="' + element.option_value_row + '"class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button> <button type="button" onclick="$(\'#option-value-row-' + element.option_value_row + '\').remove();" data-bs-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            if ($(element).attr('data-option-value-row')) {
                $('#option-value-row-' + element.option_value_row).replaceWith(html);
            } else {
                $('#option-value-' + $(element).attr('data-option-row')).append(html);

                option_value_row++;
            }

            $('#modal-option').modal('hide');
        });
    });

    var discount_row = 0;

    $('#button-discount').on('click', function() {
        html = '<tr id="discount-row-' + discount_row + '">';
        html += '  <td class="text-start"><select name="product_discount[' + discount_row + '][customer_group_id]" class="form-select">';
        html += '    <option value="1">Default</option>';
        html += '  </select><input type="hidden" name="product_discount[' + discount_row + '][product_discount_id]" value=""/></td>';
        html += '  <td class="text-end"><input type="text" name="product_discount[' + discount_row + '][quantity]" value="" placeholder="Quantity" class="form-control"/></td>';
        html += '  <td class="text-end"><input type="text" name="product_discount[' + discount_row + '][priority]" value="" placeholder="Priority" class="form-control"/></td>';
        html += '  <td class="text-end"><input type="text" name="product_discount[' + discount_row + '][price]" value="" placeholder="Price" class="form-control"/></td>';
        html += '  <td class="text-start"><div class="input-group"><input type="text" name="product_discount[' + discount_row + '][date_start]" value="" placeholder="Date Start" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
        html += '  <td class="text-start"><div class="input-group"><input type="text" name="product_discount[' + discount_row + '][date_end]" value="" placeholder="Date End" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
        html += '  <td class="text-end"><button type="button" onclick="$(\'#discount-row-' + discount_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#product-discount tbody').append(html);

        discount_row++;
    });

    var special_row = 0;

    $('#button-special').on('click', function() {
        html = '<tr id="special-row-' + special_row + '">';
        html += '  <td class="text-start"><select name="product_special[' + special_row + '][customer_group_id]" class="form-select">';
        html += '      <option value="1">Default</option>';
        html += '  </select><input type="hidden" name="product_special[' + special_row + '][product_special_id]" value=""/></td>';
        html += '  <td class="text-end"><input type="text" name="product_special[' + special_row + '][priority]" value="" placeholder="Priority" class="form-control"/></td>';
        html += '  <td class="text-end"><input type="text" name="product_special[' + special_row + '][price]" value="" placeholder="Price" class="form-control"/></td>';
        html += '  <td class="text-start"><div class="input-group"><input type="text" name="product_special[' + special_row + '][date_start]" value="" placeholder="Date Start" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
        html += '  <td class="text-start"><div class="input-group"><input type="text" name="product_special[' + special_row + '][date_end]" value="" placeholder="Date End" class="form-control date"/><div class="input-group-text"><i class="fas fa-calendar"></i></div></div></td>';
        html += '  <td class="text-end"><button type="button" onclick="$(\'#special-row-' + special_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#product-special tbody').append(html);

        special_row++;
    });

    var image_row = 0;

    $('#button-image').on('click', function() {
        html = '<tr id="product-image-row-' + image_row + '">';
        html += '  <td><div class="card image">';
        html += '    <img src="https://demo.opencart.com/image/cache/no_image-100x100.png" alt="" title="" id="thumb-image-' + image_row + '" data-oc-placeholder="https://demo.opencart.com/image/cache/no_image-100x100.png" class="card-img-top"/> <input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-product-image-' + image_row + '"/>';
        html += '    <div class="card-body">';
        html += '      <button type="button" data-oc-toggle="image" data-oc-target="#input-product-image-' + image_row + '" data-oc-thumb="#thumb-image-' + image_row + '" class="btn btn-primary btn-sm btn-block"><i class="fas fa-pencil-alt"></i> Edit</button>';
        html += '      <button type="button" data-oc-toggle="clear" data-oc-target="#input-product-image-' + image_row + '" data-oc-thumb="#thumb-image-' + image_row + '" class="btn btn-warning btn-sm btn-block"><i class="fas fa-trash-alt"></i> Clear</button>';
        html += '    </div>';
        html += '  </div></td>';
        html += '  <td class="text-start"><input type="text" name="product_image[' + image_row + '][sort_order]" value="0" placeholder="Sort Order" class="form-control"/></td>';
        html += '  <td class="text-end"><button type="button" onclick="$(\'#product-image-row-' + image_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#product-image tbody').append(html);

        image_row++;
    });

    var subscription_row = 0;

    $('#button-subscription').on('click', function() {
        html = '<tr id="subscription-row-' + subscription_row + '">';
        html += '  <td class="text-start"><select name="product_subscription[' + subscription_row + '][subscription_plan_id]" class="form-select">';
        html += '  </select></td>';
        html += '  <td class="text-start"><select name="product_subscription[' + subscription_row + '][customer_group_id]" class="form-select">';
        html += '      <option value="1">Default</option>';
        html += '  <select></td>';
        html += '  <td class="text-end"><button type="button" onclick="$(\'#subscription-row-' + subscription_row + '\').remove()" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#product-subscription tbody').append(html);

        subscription_row++;
    });


    $('#report').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#report').load(this.href);
    });

</script> -->