    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-plus-circle"></i> <?= $this->lang->line('placeholder_create_item'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= base_url('admin/store/items'); ?>" class="uk-icon-button"><i class="fas fa-arrow-left"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-body">
            <?= form_open('', 'id="additemForm" onsubmit="AddItemForm(event)"'); ?>
              <div class="uk-margin-small">
                <label class="uk-form-label"><?= $this->lang->line('placeholder_name'); ?></label>
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                    <input class="uk-input" type="text" id="item_name" placeholder="<?= $this->lang->line('placeholder_name'); ?>" required>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <label class="uk-form-label"><?= $this->lang->line('placeholder_description'); ?></label>
                <div class="uk-form-controls">
                  <textarea class="uk-textarea" id="item_description" rows="3"></textarea>
                </div>
              </div>
              <div class="uk-margin-small">
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= $this->lang->line('placeholder_category'); ?></label>
                    <div class="uk-form-controls">
                      <select class="uk-select" id="item_category">
                        <option value="0"><?= $this->lang->line('notification_select_category'); ?></option>
                        <?php foreach ($this->admin_model->getCategoryStore()->result() as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?> - <?= $this->wowrealm->getRealmName($category->realmid); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= $this->lang->line('placeholder_type'); ?></label>
                    <div class="uk-form-controls">
                      <select class="uk-select" id="item_type">
                        <option value="0"><?= $this->lang->line('notification_select_type'); ?></option>
                        <option value="1"><?= $this->lang->line('placeholder_item'); ?></option>
                        <option value="2"><?= $this->lang->line('table_header_money'); ?></option>
                        <option value="3"><?= $this->lang->line('table_header_level'); ?></option>
                        <option value="4"><?= $this->lang->line('option_rename'); ?></option>
                        <option value="8">Command</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?=$this->lang->line('placeholder_icon_name');?></label>
                    <div class="uk-form-controls">
                      <input class="uk-input" type="text" id="item_icon" placeholder="inv_belt_45">
                    </div>
                  </div>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= $this->lang->line('table_header_price'); ?> <?= $this->lang->line('placeholder_type'); ?></label>
                    <div class="uk-form-controls">
                      <select class="uk-select" id="item_price_type">
                        <option value="0"><?= $this->lang->line('notification_select_type'); ?></option>
                        <option value="1"><?= $this->lang->line('option_dp'); ?></option>
                        <option value="2"><?= $this->lang->line('option_vp'); ?></option>
                        <option value="3"><?= $this->lang->line('option_dp_vp'); ?></option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= $this->lang->line('option_dp'); ?> <?= $this->lang->line('table_header_price'); ?></label>
                    <div class="uk-form-controls">
                      <input class="uk-input" type="number" id="item_dp_price" placeholder="0" required>
                    </div>
                  </div>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= $this->lang->line('option_vp'); ?> <?= $this->lang->line('table_header_price'); ?></label>
                    <div class="uk-form-controls">
                      <input class="uk-input" type="number" id="item_vp_price" placeholder="0" required>
                    </div>
                  </div>
                </div>
              </div>
<div class="uk-margin-small">
  <label class="uk-form-label" id="command_label"><?= $this->lang->line('placeholder_command'); ?></label>
  <div class="uk-form-controls">
    <textarea 
      class="uk-textarea" 
      id="item_command" 
      rows="5"
      spellcheck="false"
      placeholder=".learn all_myclass {character}
.send money {character} &quot;VMaNGOS Shop&quot; &quot;Enjoy your gold!&quot; 100000"></textarea>

    <div id="command_help" class="uk-text-meta uk-margin-small-top" style="display:none;">
      <i class="fas fa-info-circle"></i>
      Enter one command per line.<br>
      Example:<br>
      <code>.learn all_myclass {character}</code><br>
      <code>.send money {character} "VMaNGOS Shop" "Enjoy your gold!" 100000</code><br>
      <code>{character}</code> will be automatically replaced with the character name.
    </div>
  </div>
</div>
              <div class="uk-margin-small">
                <button class="uk-button uk-button-primary uk-width-1-1" type="submit" id="button_item"><i class="fas fa-check-circle"></i> <?= $this->lang->line('button_create'); ?></button>
              </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </section>

    <script>
    var csrfName = "<?= $this->security->get_csrf_token_name() ?>";
    var csrfHash = "<?= $this->security->get_csrf_hash() ?>";

$(document).ready(function() {

function updateCommandHelp() {

    let type = $('#item_type').val();

    if (type == '0' || type == '4') {

        $('#item_command').closest('.uk-margin-small').hide();
        $('#item_command').removeAttr('required');
        $('#item_command').val('');
        $('#command_help').hide();

    } else {

        $('#item_command').closest('.uk-margin-small').show();
        $('#item_command').attr('required', true);

        if (type == '8') {

            $('#command_label').text('Command');

            $('#item_command').attr(
                'placeholder',
                '.learn all_myclass {character}\n.send money {character} "VMaNGOS Shop" "Enjoy your gold!" 100000'
            );

            $('#command_help').show();

        } else if (type == '2') {

            $('#command_label').text('Gold');

            $('#item_command').attr(
                'placeholder',
                'Example: 100000'
            );

            $('#command_help').hide();

} else if (type == '3') {

    $('#command_label').text('Level');

    $('#item_command').attr(
        'placeholder',
        'Example: 60'
    );

    $('#command_help').hide();

} else if (type == '1') {

    $('#command_label').text('Item ID');

    $('#item_command').attr(
        'placeholder',
        'Example: 12345'
    );

    $('#command_help').hide();

} else {

            $('#command_label').text('Command');

            $('#item_command').attr(
                'placeholder',
                'Enter command here...'
            );

            $('#command_help').hide();
        }
    }

}

    $('#item_type').on('change', function() {
        updateCommandHelp();
    });

    updateCommandHelp();

});

      function AddItemForm(e) {
        e.preventDefault();

        var name = $.trim($('#item_name').val());
        var description = $.trim($('#item_description').val());
        var category = $.trim($('#item_category').val());
        var type = $.trim($('#item_type').val());
        var icon = $.trim($('#item_icon').val());
        var price_type = $.trim($('#item_price_type').val());
        var dp_price = $.trim($('#item_dp_price').val());
        var vp_price = $.trim($('#item_vp_price').val());
        var command = $.trim($('#item_command').val());

        if(type == '4'){
    command = '';
}

if(type == 1 || type == 2 || type == 3){

    if(command == '' || !Number.isInteger(Number(command)) || command <= 0){

        let errorMessage = 'Value must be a valid number';

        if(type == 1)
            errorMessage = 'Item ID required';

        if(type == 2)
            errorMessage = 'Gold amount required';

        if(type == 3)
            errorMessage = 'Level required';

        $.amaran({
          'theme': 'awesome error',
          'content': {
            title: '<?= $this->lang->line('notification_title_error'); ?>',
            message: errorMessage,
            info: '',
            icon: 'fas fa-times-circle'
          },
          'delay': 2500,
          'position': 'top right',
          'inEffect': 'slideRight',
          'outEffect': 'slideRight'
        });

        return false;
    }
}
        if(name == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_name_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 2500,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        if(category == 0){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_select_category'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 2500,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        if(type == 0 || price_type == 0){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_select_type'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 2500,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }

if(type == 8 && command == ''){

    $.amaran({
      'theme': 'awesome error',
      'content': {
        title: '<?= $this->lang->line('notification_title_error'); ?>',
        message: 'Command required',
        info: '',
        icon: 'fas fa-times-circle'
      },
      'delay': 2500,
      'position': 'top right',
      'inEffect': 'slideRight',
      'outEffect': 'slideRight'
    });

    return false;
}
        $.ajax({
          url:"<?= base_url($lang.'/admin/store/item/add'); ?>",
          method:"POST",
          data:{name, description, category, type, price_type, dp_price, vp_price, icon, command, [globalThis.csrfName]: globalThis.csrfHash},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= $this->lang->line('notification_title_info'); ?>',
                message: '<?= $this->lang->line('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 1000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= $this->lang->line('notification_title_success'); ?>',
                  message: '<?= $this->lang->line('notification_item_created'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#additemForm')[0].reset();
            setTimeout(function() {
                    location.reload();
                }, 500);
          }
        });
      }
    </script>
