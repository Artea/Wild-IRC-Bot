<?php

/*
	WildPHP - a modular and easily extendable IRC bot written in PHP
	Copyright (C) 2015 WildPHP

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
namespace WildPHP\IRC;

use Phergie\Irc\Parser as PhergieParser;

class CommandPRIVMSG implements ICommandPRIVMSG
{

	protected $message;

	public function __construct(IRCMessage $ircMessage)
	{
		$parser = new PhergieParser();
		$this->message = $parser->parse($ircMessage);
	}

	public function getMessage()
	{
		return $this->message['message'];
	}

	public function getCommand()
	{
		return $this->message['command'];
	}

	public function getParams()
	{
		return (array) $this->message['params'];
	}

	public function getPrefix()
	{
		return (string) $this->message['string'];
	}

	public function getSender()
	{
		return new HostMask($this->message['prefix']);
	}

	public function getTargets()
	{
		return (array) $this->message['targets'];
	}

	public function getUserMessage()
	{
		return (string) $this->message['params']['text'];
	}

}