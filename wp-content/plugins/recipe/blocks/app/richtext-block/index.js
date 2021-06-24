
const { registerBlockType }         =   wp.blocks;
const { RichText }                  =   wp.blockEditor;
const { __ }                        =   wp.i18n;

registerBlockType( 'udemy/rich-text', {
    title:                              __( 'Rich Text Example', 'recipe' ),
    description:                        __( 'Rich text example', 'recipe' ),
    category:                           'common',
    attributes: {
        message: {
            type:                       'array',
            source:                     'children',
            selector:                   '.message-ctr'   
        }
    },
    edit: ( props ) => {
        return (
            <div className={ props.className }>
                <h3>Rich Text Example Block</h3>
                <RichText tagName="div"
                          multiline="p"
                          placholder={ __( 'Add your content here.', 'recipe' ) }
                          onChange={ ( new_val ) => {
                              props.setAttributes({ message: new_val });
                          }}
                          value={ props.attributes.message }/>
            </div>
        );
    },
    save: ( props ) => {
        return (
            <div className="message-ctr">
                <h3>Rich Text Example Blocks</h3>
                <div>
                    { props.attributes.message }
                </div>
            </div>
        );
    }
});