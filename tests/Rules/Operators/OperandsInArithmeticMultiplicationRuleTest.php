<?php declare(strict_types = 1);

namespace PHPStan\Rules\Operators;

use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;

class OperandsInArithmeticMultiplicationRuleTest extends \PHPStan\Testing\RuleTestCase
{

	protected function getRule(): Rule
	{
		return new OperandsInArithmeticMultiplicationRule(
			new OperatorRuleHelper(
				new RuleLevelHelper($this->createBroker(), true, false, true)
			)
		);
	}

	public function testRule(): void
	{
		$this->analyse([__DIR__ . '/data/operators.php'], [
			[
				'Only numeric types are allowed in *, string given on the right side.',
				51,
			],
			[
				'Only numeric types are allowed in *, null given on the right side.',
				54,
			],
			[
				'Only numeric types are allowed in *, null given on the right side.',
				55,
			],
			[
				'Only numeric types are allowed in *, string given on the right side.',
				55,
			],
		]);
	}

}
