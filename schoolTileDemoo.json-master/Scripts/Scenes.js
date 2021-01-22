class Scene1 extends Phaser.Scene {
    constructor() {
        super('Scene1')
    }

    preload() {
        this.load.image('play', './Assets/play.png')
    }
    create() {
        let button = this.add.image(180, 180, 'play').setScale(2)
        button.setInteractive().on('pointerdown', () => {
            this.scene.switch('Scene2')
        })
    }
}
////////////////////////////////////////
class Scene2 extends Phaser.Scene {
    constructor() {
        super('Scene2')
    }

    preload() {

        this.load.image('BAP', './Assets/BAP.png')
        this.load.image('bitGame', './Assets/BitGame.png')
    }

    create() {

        this.add.image(180, 70, 'BAP')
        let button = this.add.image(180, 280, 'bitGame')
        button.setInteractive().on('pointerdown', () => {
            this.scene.switch('Scene3')
        })
    }
}
/////////////////////////////////////////
class Scene3 extends Phaser.Scene {
    constructor() {
        super('Scene3');
    }

    preload() {

        this.load.image('characterSelection', './Assets/CharacterSelect.png')
        this.load.image('boy', './Assets/character_select_boy.png')
        this.load.image('girl', './Assets/character_select_girl.png')
    }

    create() {

        this.add.image(180, 50, 'characterSelection')
        let boy = this.add.image(100, 200, 'boy').setScale(0.2)
        let girl = this.add.image(260, 200, 'girl').setScale(0.2)

        boy.setInteractive().on('pointerdown', () => {
            this.scene.switch('GameScene')
        })

        girl.setInteractive().on('pointerdown', () => {
            this.scene.switch('GameScene2')
        })
    }
}
///////////////////////////////////////////////
class GameScene extends Phaser.Scene {
    constructor() {
        super('GameScene')
    }

    preload() {

        this.load.image('tiles', './Assets/TileSets/game.png')
        this.load.tilemapTiledJSON('map', 'Scripts/JSON/untitled9.json')
        // this.load.image('npc', 'Assets/character_select_boy.png')

        this.load.spritesheet('character', './Assets/Sprite/characters.png', {
            frameWidth: 16,
            frameHeight: 16,
        })

        this.keys1
        this.player1
    }

    create() {
        //setUpMap
        const map = this.make.tilemap({key: 'map'})
        const tileSet = map.addTilesetImage('game', 'tiles')

        //setUpLayer
        const lastLayer = map.createStaticLayer('lastLayer', tileSet, 0, 0)
        const tileCollision = map.createStaticLayer('tileCollision', tileSet, 0, 0)
        const firstLayer = map.createStaticLayer('firstLayer', tileSet, 0, 0)
        const building = map.createStaticLayer('building', tileSet, 0, 0)
        const textures = map.createStaticLayer('textures', tileSet, 0, 0)
        const midLayer = map.createStaticLayer('midLayer', tileSet, 0, 0)
        const midLayer1 = map.createStaticLayer('midLayer1', tileSet, 0, 0)
        const midLayer2 = map.createStaticLayer('midLayer2', tileSet, 0, 0)
        const midLayer3 = map.createStaticLayer('midLayer3', tileSet, 0, 0)
        const inDepthLayer1 = map.createStaticLayer('inDepthLayer1', tileSet, 0, 0)
        const inDepthLayer2 = map.createStaticLayer('inDepthLayer2', tileSet, 0, 0)
        const inDepthLayer3 = map.createStaticLayer('inDepthLayer3', tileSet, 0, 0)

        const portal = map.findObject("objectLayer", obj => obj.name === "portal")

        this.newPortal = new Phaser.Geom.Rectangle(portal.x, portal.y,
            portal.width, portal.height)
        console.log(portal)
        this.player1 = new Player1(this, 500, 200, 'character').setScale(1.2)
        // this.npc = new NPC(this, 200, 300, 'npc')

        //configLayer
        lastLayer.setCollisionByProperty({collide: true})
        tileCollision.setCollisionByProperty({collide: true})
        building.setCollisionByProperty({collide: true})
        midLayer1.setCollisionByProperty({collide: true})
        midLayer2.setCollisionByProperty({collide: true})
        midLayer3.setCollisionByProperty({collide: true})
        inDepthLayer1.setDepth(10)
        inDepthLayer2.setDepth(10)
        inDepthLayer3.setDepth(10)

        //setUpCollision
        this.physics.add.collider(this.player1, lastLayer)
        this.physics.add.collider(this.player1, tileCollision)
        this.physics.add.collider(this.player1, building)
        this.physics.add.collider(this.player1, midLayer1)
        this.physics.add.collider(this.player1, midLayer2)
        this.physics.add.collider(this.player1, midLayer3)

        this.physics.world.bounds.width = 640
        this.physics.world.bounds.height = 640

        //setUpCamera
        this.cameras.main.startFollow(this.player1)
        this.cameras.main.setBounds(0, 0, 640, 640)

        // const debug = this.add.graphics().setAlpha(0.5)
        // midLayer1.renderDebug(debug, {
        //     tileColor: null,
        //     collidingTileColor: new Phaser.Display.Color(255,255,50,255),
        //     faceColor: new Phaser.Display.Color(0,255,0,255)
        // })

    }

    update() {
        this.player1.update()
        if (this.newPortal.contains(this.player1.x + this.player1.width / 2,
            this.player1.y + this.player1.height / 2)) this.scene.switch('GameScene2')
    }
}
////////////////////////////////////////////////////////////
class GameScene2 extends Phaser.Scene {
    constructor() {
        super('GameScene2')
    }

    preload() {

        this.load.image('tiles', './Assets/TileSets/game.png')
        this.load.tilemapTiledJSON('swag', 'Scripts/JSON/GameTileDemo2.json')

        this.load.spritesheet('character', './Assets/Sprite/characters.png', {
            frameWidth: 16,
            frameHeight: 16
        });

        this.keys1
        this.player1
    }

    create() {
        //setUpMap
        const map = this.make.tilemap({key: 'swag'})
        const tileSet = map.addTilesetImage('game', 'tiles')
        const belowLayer = map.createStaticLayer('belowLayer', tileSet, 0, 0)
        const worldLayer = map.createStaticLayer('worldLayer', tileSet, 0, 0)
        const aboveLayer = map.createStaticLayer('aboveLayer', tileSet, 0, 0)

        this.player1 = new Player1(this, 200, 200, 'character')

        //setUpLayers
        worldLayer.setCollisionByProperty({collides: true})
        aboveLayer.setDepth(10)
        //setUpCollision
        this.player1.body.setCollideWorldBounds(true)
        this.physics.add.collider(this.player1, worldLayer)
        this.physics.world.bounds.width = 400
        this.physics.world.bounds.height = 400

        //setUpCamera
        this.cameras.main.startFollow(this.player1)
        this.cameras.main.setBounds(0, 0, 400, 400)

        // const debug = this.add.graphics().setAlpha(0.5)
        // worldLayer.renderDebug(debug, {
        //     tileColor: null,
        //     collidingTileColor: new Phaser.Display.Color(255,255,50,255),
        //     faceColor: new Phaser.Display.Color(0,255,0,255)
        // })

    }

    update() {
        this.player1.update()
    }
}

