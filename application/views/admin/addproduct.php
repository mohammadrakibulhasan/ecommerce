<div class="container">
    <h1 class="text-center">Add Product</h1>
    <!-- Nav tabs -->
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
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="image-tab" data-toggle="tab" data-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
        </li>
    </ul>
    <hr>
    <br>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
            General
            <hr>
            <div class="row mb-3 required">
                <label for="input-name-1" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" name="product_description[1][name]" placeholder="Product Name" id="input-name-1" class="form-control">
                    </div>
                    <div id="error-name-1" class="invalid-feedback"></div>
                </div>
            </div>
            <hr>
            <div class="row mb-3 required">
                <label for="input-meta-title-1" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" name="product_description[1][product_description]" placeholder="Product Description" id="input-product-description-1" class="form-control">
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
                        <input type="text" name="product_description[1][model]" placeholder="Product Model" id="input-model-1" class="form-control">
                    </div>
                    <div id="error-model-1" class="invalid-feedback"></div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <label for="input-sku" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" name="sku" value="" placeholder="SKU" id="input-sku" class="form-control">
                    </div>
                    <div class="form-text">Stock Keeping Unit</div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <label for="input-upc" class="col-sm-2 col-form-label">UPC</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" name="upc" value="" placeholder="UPC" id="input-upc" class="form-control">
                    </div>
                    <div class="form-text">Universal Product Code</div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <label for="input-location" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" name="location" value="" placeholder="Location" id="input-location" class="form-control">
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
                            <input type="text" name="price" value="" placeholder="Price" id="input-price" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input-tax-class" class="col-sm-2 col-form-label">Tax Class</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <select name="tax_class_id" id="input-tax-class" class="form-select">
                                <option value="0"> --- None --- </option>
                                <option value="9">Taxable Goods</option>
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
                        <input type="text" name="quantity" value="1" placeholder="Quantity" id="input-quantity" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input-minimum" class="col-sm-2 col-form-label">Minimum Quantity</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="minimum" value="1" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
                        </div>
                        <div class="form-text">Force a minimum ordered amount</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Subtract Stock</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div id="input-subtract" class="form-check form-switch form-switch-lg">
                                <input type="checkbox" name="subtract" class="form-check-input">
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
                            <input type="date" name="date_available" value="2023-04-08" placeholder="Date Available" id="input-date-available" class="form-control date">
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
                                <input type="checkbox" name="shipping" class="form-check-input">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input-length" class="col-sm-2 col-form-label">Dimensions (L x W x H)</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" name="length" value="" placeholder="Length" id="input-length" class="form-control">
                            <input type="text" name="width" value="" placeholder="Width" id="input-width" class="form-control">
                            <input type="text" name="height" value="" placeholder="Height" id="input-height" class="form-control">
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
                            <input type="text" name="weight" value="" placeholder="Weight" id="input-weight" class="form-control">
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
        <div class="tab-pane" id="links" role="tabpanel" aria-labelledby="links-tab">Links</div>
        <div class="tab-pane" id="attribute" role="tabpanel" aria-labelledby="attribute-tab">Attribute</div>
        <div class="tab-pane" id="option" role="tabpanel" aria-labelledby="option-tab">Option</div>
        <div class="tab-pane" id="discount" role="tabpanel" aria-labelledby="discount-tab">Discount</div>
        <div class="tab-pane" id="special" role="tabpanel" aria-labelledby="special-tab">Special</div>
        <div class="tab-pane" id="image" role="tabpanel" aria-labelledby="image-tab">Image</div>
    </div>
</div>