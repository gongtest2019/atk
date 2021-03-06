<?php

namespace Sintattica\Atk\Attributes;

/**
 * The atkHiddenAttribute behaves very similar to an atkDummyAttribute, but with the main difference
 * being that the attribute is always hidden, and the text passed to the attribute is not displayed
 * visibly but posted as a hidden form value.
 *
 * @author Ivo Jansch <ivo@ibuildings.com>
 */
class HiddenAttribute extends DummyAttribute
{
    /**
     * The atkHiddenAttribute has a custom constructor. It's purpose is to force the self::AF_HIDE
     * flag, regardless of flags passed. Its behaviour is identical to atkDummyAttribute's
     * constructor in every other way.
     *
     * @param string $name
     * @param int $flags
     * @param string $text
     */
    public function __construct($name, $flags = 0, $text = '')
    {
        $flags |= self::AF_HIDE;

        parent::__construct($name, $flags, $text);
    }

    /**
     * This method is called by the framework whenever an attribute needs to be rendered within a hidden form.
     * In this case, the attribute renders a hidden input field using its text as its hidden value.
     *
     * @param array $record
     * @param string $fieldprefix
     * @param string $mode
     *
     * @return string html
     */
    public function hide($record, $fieldprefix, $mode)
    {
        $result = '<input type="hidden" id="'.$this->getHtmlId($fieldprefix).'" name="'.$this->getHtmlName($fieldprefix).'" value="'.htmlspecialchars($this->m_text).'">';

        return $result;
    }
}
