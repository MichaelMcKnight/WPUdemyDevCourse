<?php
 namespace MailPoetVendor\Symfony\Component\Validator\Constraints; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\Validator\Constraint; use MailPoetVendor\Symfony\Component\Validator\ConstraintValidator; use MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedTypeException; use MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedValueException; class IsbnValidator extends \MailPoetVendor\Symfony\Component\Validator\ConstraintValidator { public function validate($value, \MailPoetVendor\Symfony\Component\Validator\Constraint $constraint) { if (!$constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedTypeException($constraint, \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::class); } if (null === $value || '' === $value) { return; } if (!\is_scalar($value) && !(\is_object($value) && \method_exists($value, '__toString'))) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedValueException($value, 'string'); } $value = (string) $value; $canonical = \str_replace('-', '', $value); if ('isbn10' === $constraint->type) { if (\true !== ($code = $this->validateIsbn10($canonical))) { $this->context->buildViolation($this->getMessage($constraint, $constraint->type))->setParameter('{{ value }}', $this->formatValue($value))->setCode($code)->addViolation(); } return; } if ('isbn13' === $constraint->type) { if (\true !== ($code = $this->validateIsbn13($canonical))) { $this->context->buildViolation($this->getMessage($constraint, $constraint->type))->setParameter('{{ value }}', $this->formatValue($value))->setCode($code)->addViolation(); } return; } $code = $this->validateIsbn10($canonical); if (\MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TOO_LONG_ERROR === $code) { $code = $this->validateIsbn13($canonical); if (\MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TOO_SHORT_ERROR === $code) { $code = \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TYPE_NOT_RECOGNIZED_ERROR; } } if (\true !== $code) { $this->context->buildViolation($this->getMessage($constraint))->setParameter('{{ value }}', $this->formatValue($value))->setCode($code)->addViolation(); } } protected function validateIsbn10($isbn) { $checkSum = 0; for ($i = 0; $i < 10; ++$i) { if (!isset($isbn[$i])) { return \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TOO_SHORT_ERROR; } if ('X' === $isbn[$i]) { $digit = 10; } elseif (\ctype_digit($isbn[$i])) { $digit = $isbn[$i]; } else { return \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::INVALID_CHARACTERS_ERROR; } $checkSum += $digit * (10 - $i); } if (isset($isbn[$i])) { return \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TOO_LONG_ERROR; } return 0 === $checkSum % 11 ? \true : \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::CHECKSUM_FAILED_ERROR; } protected function validateIsbn13($isbn) { if (!\ctype_digit($isbn)) { return \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::INVALID_CHARACTERS_ERROR; } $length = \strlen($isbn); if ($length < 13) { return \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TOO_SHORT_ERROR; } if ($length > 13) { return \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::TOO_LONG_ERROR; } $checkSum = 0; for ($i = 0; $i < 13; $i += 2) { $checkSum += $isbn[$i]; } for ($i = 1; $i < 12; $i += 2) { $checkSum += $isbn[$i] * 3; } return 0 === $checkSum % 10 ? \true : \MailPoetVendor\Symfony\Component\Validator\Constraints\Isbn::CHECKSUM_FAILED_ERROR; } protected function getMessage($constraint, $type = null) { if (null !== $constraint->message) { return $constraint->message; } elseif ('isbn10' === $type) { return $constraint->isbn10Message; } elseif ('isbn13' === $type) { return $constraint->isbn13Message; } return $constraint->bothIsbnMessage; } } 