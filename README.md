## Maaslanden
	A game of extracting and collecting resources to gain from the board.
	The game is part board game and part this online website. The game will be played with 3D printed tiles.
	Each city tile has an NFC tag in it with a link to this website [maaslanden.dev-ross.com]. The tag contains information such as:
		- City ID
		- Game ID
		- Key
	The database then knows what city is scanned and to what game it belongs. The key is so no one can just add random cities or reset a game that is not theirs.

	Upon first scanning a city in a new game, you will be asked who is scanning the city [player 1-4 (+?)]. and it will then be assigned values such as:
		- Name 			(random from a database)
		- Type 			(e.g. Village or Capital)
		- Population	(semi-random, depends on the type)
		- Industry		(what industry mainly functions in the city)
		- Player 		(who claims this city)
		- City ID		(gotten from the NFC tag)
	
	Each game will also include a 'reset' card which resets the game.
	Each game will also include a 'reassign' card which allows you to reassign a city, if missassigned.
	


## Maaslanden roadmap: (Very much subject to change)

		1. Owner awareness [check]
            Know which player owns which ctiy.
            When initializing a city, chose which player claims it.
            using the reassign card you can reassign a city if you've made a mistake
            - In a final game it would be cool to have some sort of box with a lock on it where you put this card, so one can only use it with permission of the others 
        
		2. Move to maaslanden.dev-ross.com [check]
            this is so i can update maaslanden easily without having to update the entire portofolio
        
        3. multiple industries
            Allow cities to have multiple industries, which increases the range of the city
            by a cerain amount of tiles

        4. Surroundings awareness
            Know what tiles are surrounding what cities.
            should be updatable trough the page of that city.

        5. Upgrades

        L. Front-end (least important)
        L. maaslanden.net (final product)

		1.1. XP
			if youve played a lot you can gain XP and rank yourself amoung your friends and the other players over the world



## notes

so i can make it instead that the industry for a city has a range of 2 rather then one. so if your industry is forest and theres
no forest directly adjecent to the city, it has a range of 2 so it can also look beyond the directly adjecents