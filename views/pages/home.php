<div class="page-home">
    <div class="container-fluid">
        <h1 class="page-header">Technical Exam</h1>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="alert alert-info">
                    Please add a string and select a sorting method.
                </div>

                <form action="" method="post">
                    <div class="form-group <?php echo (isset($errors) && isset($errors['sort_string'])) ? 'has-error' : ''; ?>">
                        <label for="sort_string">String: </label>
                        <input
                                type="text"
                                name="sort_string"
                                id="sort_string"
                                value="<?php echo (isset($data) && $data['sort_string']) ? $data['sort_string'] : ''; ?>"
                                class="form-control">

                        <?php if((isset($errors) && isset($errors['sort_string']))) : ?>
                            <div class="alert alert-danger message">
                                <?php echo (isset($errors['sort_string'])) ? $errors['sort_string'][0] : ''; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?php echo (isset($errors) && isset($errors['sort_method'])) ? 'has-error' : ''; ?>">
                        <label for="sort_method">Sort Method: </label>
                        <select name="sort_method" id="sort_method" class="form-control">
                            <option value="">Please select a sort method.</option>
                            <?php foreach($sortMethods as $sortMethod) :  ?>
                                <option value="<?php echo $sortMethod['value']; ?>"
                                    <?php echo (isset($data['sort_method']) && ($data['sort_method'] == $sortMethod['value'])) ? 'selected' : ''; ?>
                                >
                                    <?php echo $sortMethod['label'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <?php if((isset($errors) && isset($errors['sort_method']))) : ?>
                            <div class="alert alert-danger message">
                                <?php echo  (isset($errors['sort_method'])) ? $errors['sort_method'][0] : ''; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <input type="submit" class="btn btn-primary">
                    <a href="/home" class="btn btn-danger">Cancel</a>
                </form>
            </div>

            <div class="col-xs-12 col-md-6">
                <?php if(isset($sortedString) && $sortedString !== '') : ?>
                    <div class="alert alert-success">
                        <h6>Result : </h6>
                        <p><?php echo $sortedString; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>