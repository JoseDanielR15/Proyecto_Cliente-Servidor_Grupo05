const canvas = document.getElementById('networkCanvas');
        const ctx = canvas.getContext('2d');
        let particles = [];
        const properties = {
            particleColor: 'rgba(255, 255, 255, 0.5)',
            lineColor: 'rgba(255, 255, 255, 0.2)',
            particleRadius: 2,
            particleCount: 80,
            maxDistance: 120,
        };

        function resizeCanvas() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        const mouse = { x: null, y: null };
 
        canvas.parentElement.addEventListener('mousemove', (e) => {
            const rect = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        });

        canvas.parentElement.addEventListener('mouseleave', () => {
            mouse.x = null;
            mouse.y = null;
        });

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.velocityX = Math.random() * 1.5 - 0.75;
                this.velocityY = Math.random() * 1.5 - 0.75;
            }

            update() {
                this.x += this.velocityX;
                this.y += this.velocityY;

                if (this.x < 0 || this.x > canvas.width) this.velocityX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.velocityY *= -1;

                if(mouse.x && mouse.y){
                    let dx = mouse.x - this.x;
                    let dy = mouse.y - this.y;
                    let dist = Math.sqrt(dx*dx + dy*dy);
                    if (dist < 100) {
                        this.x -= dx / 50;
                        this.y -= dy / 50;
                    }
                }
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, properties.particleRadius, 0, Math.PI * 2);
                ctx.fillStyle = properties.particleColor;
                ctx.fill();
            }
        }

        function init() {
            particles = [];
            for (let i = 0; i < properties.particleCount; i++) {
                particles.push(new Particle());
            }
        }

        function drawLines() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    let dx = particles[i].x - particles[j].x;
                    let dy = particles[i].y - particles[j].y;
                    let dist = Math.sqrt(dx*dx + dy*dy);

                    if (dist < properties.maxDistance) {
                        ctx.lineWidth = 0.5;
                        ctx.strokeStyle = properties.lineColor;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            drawLines();
            requestAnimationFrame(animate);
        }

        init();
        animate();