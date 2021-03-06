{if ($runtime.company_id && "ULTIMATE"|fn_allowed_for || "MULTIVENDOR"|fn_allowed_for || $runtime.simple_ultimate) && $config.discussion.enable_order_communication}

{assign var="discussion" value=$order_info.order_id|fn_get_discussion:"O"}

{include file="common/subheader.tpl" title=__("discussion")}

<div class="control-group">
    <label class="control-label">{__("discussion_title_order")}</label>
    <div class="controls">
        {if "discussion.add"|fn_check_view_permissions}
            <input type="hidden" name="discussion[object_id]" value="{$order_info.order_id}" />
            <input type="hidden" name="discussion[object_type]" value="O" />
            <select name="discussion[type]">
                {if $addons.discussion.order_initiate == "YesNo::YES"|enum && !$discussion}<option selected="selected" value="">{__("available")}</option>{/if}
                <option {if $discussion.type == "Addons\\Discussion\\DiscussionTypes::TYPE_DISABLED"|enum}selected="selected"{/if} value="{"Addons\\Discussion\\DiscussionTypes::TYPE_DISABLED"|enum}">{__("disabled")}</option>
                <option {if $discussion.type == "Addons\\Discussion\\DiscussionTypes::TYPE_COMMUNICATION"|enum}selected="selected"{/if} value="{"Addons\\Discussion\\DiscussionTypes::TYPE_COMMUNICATION"|enum}">{__("enabled")}</option>
            </select>
        {else}
            <span class="shift-input">{if $discussion.type == "Addons\\Discussion\\DiscussionTypes::TYPE_COMMUNICATION"|enum}{__("enabled")}{else}{__("disabled")}{/if}</span>
        {/if}
    </div>
</div>
{/if}